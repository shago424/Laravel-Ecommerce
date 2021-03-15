<?php 

namespace App\Http\Controllers\Slider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Model\Slider;
use Session;
use Image;
use Exception;
class SliderController extends Controller
{
   public function view(){
    	$data = Slider::orderby('id','DESC')->get();
    	return view('backend.slider.view-slider',compact('data'));
    }

    public function add(){

    	return view('backend.slider.add-slider');
    }
    
     public function store(Request $request){

     	$request->validate([
     		'title' => 'required',
     		'sub_title' => 'required',
     		'url' => 'required',
     		'start' => 'required',
     		'end' => 'required',
     		'image' => 'required',
     	]);

      $images = [];

        if ($request->hasFile('image')){
          $sl = 0;
         foreach($request->file('image') as $file) {
          $fileEx =$file->getClientOriginalExtension();
          $fileName= date('YmdHis'.$sl.'.'). $fileEx;
          
          Image::make($file)->resize(500,250)->save(public_path('upload/sliderimage/') . $fileName);
          $images[] = $fileName;
          $sl++;
          }
       }

    	$data = new Slider();
      $data->title = $request->title;
      $data->sub_title = $request->sub_title;
      $data->url = $request->url;
      $data->start = $request->start;
      $data->end = $request->end;
      $data->image =json_encode($images);

      

      $data->save();
    	return redirect()->route('sliders.view-slider')->with('success','Slider Inserted Successfully');
    }
        
        public function edit($id){
            $editdata = Slider::find($id);
            return view('backend.slider.edit-slider',compact('editdata'));

        }

        public function update(Request $request,$id){
        	$request->validate([
     		'title' => 'required',
     		'sub_title' => 'required',
     		'url' => 'required',
     		'start' => 'required',
     		'end' => 'required',
     		'image' => 'required',
     	]);

      

    

          $data = Slider::find($id);
          $data->title = $request->title;
		      $data->sub_title = $request->sub_title;
		      $data->url = $request->url;
		      $data->start = $request->start;
		      $data->end = $request->end;
         
          if ($request->file('image')){
          $file = $request->file('image');
          @unlink(public_path('upload/sliderimage/'.$data->image));
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/sliderimage'), $filename);
          $data['image'] = $filename;
        }
        $data->save();

        return redirect()->route('sliders.view-slider')->with('success','Slider Updated Successfully');

        }

          public function delete($id){
           
            $slider = Slider::find($id);
            $images = json_decode($slider->image);
            foreach($images as $file) {
               unlink(public_path('upload/sliderimage/') . $file);
      
           }
 
            $slider->delete();
            return redirect()->route('sliders.view-slider')->with('success','Slider Deleted Successfully');

          } 

          public function inactive($id){
            $brand = Slider::find($id);
            $brand->status = 0;
            $brand->save();

           Session::flash('success','Brand Inactive Successfully!');

    	return back();

        }
public function active($id){
            $brand = Slider::find($id);
            $brand->status = 1;
            $brand->save();

           Session::flash('success','Brand Active Successfully!');

    	return back();

        }
        	public function brandstatus($id, $status){
            $brand = Slider::find($id);
            $brand->status = $status;
            $brand->save();
     		 return response()->json(['message' =>'success']);

        }
}
