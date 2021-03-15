<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Model\Photo;

class PhotoController extends Controller
{
    public function view(){
    $data['alldata'] = Photo::all();
    return view('backend.photo.view-photo',$data);
    }

    public function add(){

    	return view('backend.photo.add-photo');
    }
    
     public function store(Request $request){
    	$data = new Photo();
      $data->title = $request->title;
    	$data->created_by = Auth::user()->id;
    	 if ($request->file('image')){
          $file = $request->file('image');
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/photoimage'), $filename);
          $data['image'] = $filename;
        }
    	$data->save();
    	return redirect()->route('photos.view')->with('success','Photo Inserted Successfully');
    }
        
        public function edit($id){
            $editdata = Photo::find($id);
            return view('backend.photo.edit-photo',compact('editdata'));

        }

        public function update(Request $request,$id){
            $data = Photo::find($id);
            $data->title = $request->title;
            $data->updated_by = Auth::user()->id;
         if ($request->file('image')){
          $file = $request->file('image');
          @unlink(public_path('upload/photoimage/'.$data->image));
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/photoimage'), $filename);
          $data['image'] = $filename;
        }
        $data->save();

        return redirect()->route('photos.view')->with('success','Photo Updated Successfully');

        }

          public function delete($id){
            $photo = Photo::find($id);

          if (file_exists('public/upload/photoimage/' . $photo->image) AND !
            empty($photo->image)){
               unlink('public/upload/photoimage/' . $photo->image);
       }
            $photo->delete();
            return redirect()->route('photos.view')->with('success','Photo Deleted Successfully');

          }  
}
