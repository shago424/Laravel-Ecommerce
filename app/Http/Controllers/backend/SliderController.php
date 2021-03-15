<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Model\Slider;
 

class SliderController extends Controller
{
    public function view(){
    $data['alldata'] = Slider::all();
    return view('backend.slider.view-slider',$data);
    }

    public function add(){

    	return view('backend.slider.add-slider');
    }
    
     public function store(Request $request){
    	$data = new Slider();
      $data->short_title = $request->short_title;
      $data->long_title = $request->long_title;
    	$data->created_by = Auth::user()->id;
    	 if ($request->file('image')){
          $file = $request->file('image');
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/sliderimage'), $filename);
          $data['image'] = $filename;
        }
    	$data->save();
    	return redirect()->route('sliders.view')->with('success','Slider Inserted Successfully');
    }
        
        public function edit($id){
            $editdata = Slider::find($id);
            return view('backend.slider.edit-slider',compact('editdata'));

        }

        public function update(Request $request,$id){
            $data = Slider::find($id);
            $data->short_title = $request->short_title;
            $data->long_title = $request->long_title;
            $data->updated_by = Auth::user()->id;
         if ($request->file('image')){
          $file = $request->file('image');
          @unlink(public_path('upload/sliderimage/'.$data->image));
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/sliderimage'), $filename);
          $data['image'] = $filename;
        }
        $data->save();

        return redirect()->route('sliders.view')->with('success','Slider Updated Successfully');

        }

          public function delete($id){
            $slider = Slider::find($id);

          if (file_exists('public/upload/sliderimage/' . $slider->image) AND !
            empty($slider->image)){
               unlink('public/upload/sliderimage/' . $slider->image);
       }
            $slider->delete();
            return redirect()->route('sliders.view')->with('success','Slider Deleted Successfully');

          } 
}
