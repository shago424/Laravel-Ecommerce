<?php
 
namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Model\Stuff;

class StuffController extends Controller
{
    public function view(){
    $data['alldata'] = Stuff::all();
    return view('backend.stuff.view-stuff',$data);
    }

    


    public function add(){

    	return view('backend.stuff.add-stuff');
    }
    
     public function store(Request $request){
      $data = new Stuff();
      $data->index_no = $request->index_no;
      $data->name = $request->name;
      $data->desi = $request->desi;
      $data->subject = $request->subject;
      $data->gender = $request->gender;
      $data->religion = $request->religion;
      $data->join_date = $request->join_date;
      $data->address = $request->address;
       $data->mobile = $request->mobile;
      $data->email = $request->email;
    	$data->created_by = Auth::user()->id;
    	 if ($request->file('image')){
          $file = $request->file('image');
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/stuffimage'), $filename);
          $data['image'] = $filename;
        }

       

    	$data->save();
    	return redirect()->route('stuffs.view')->with('success','Stuff Inserted Successfully');
    }
        
        public function edit($id){
            $editdata = Stuff::find($id);
            return view('backend.stuff.edit-stuff',compact('editdata'));

        }

        public function update(Request $request,$id){
      $data = Stuff::find($id);
      $data->index_no = $request->index_no;
      $data->name = $request->name;
      $data->desi = $request->desi;
      $data->subject = $request->subject;
      $data->gender = $request->gender;
      $data->religion = $request->religion;
      $data->join_date = $request->join_date;
      $data->address = $request->address;
       $data->mobile = $request->mobile;
      $data->email = $request->email;
            $data->updated_by = Auth::user()->id;
         if ($request->file('image')){
          $file = $request->file('image');
          @unlink(public_path('upload/stuffimage/'.$data->image));
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/stuffimage'), $filename);
          $data['image'] = $filename;
        }

        
        $data->save();

        return redirect()->route('stuffs.view')->with('success','Stuff Updated Successfully');

        }

          public function delete($id){
            $stuff = Stuff::find($id);

          if (file_exists('public/upload/stuffimage/' . $stuff->image) AND !
            empty($stufft->image)){
               unlink('public/upload/stuffimage/' . $stuff->image);
       }
            $stuff->delete();
            return redirect()->route('stuffs.view')->with('success','Stuff Deleted Successfully');

          }  
}
