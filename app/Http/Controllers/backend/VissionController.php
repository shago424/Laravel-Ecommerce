<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Model\Vission;

class VissionController extends Controller
{
    public function view(){
   	$data['countvission'] = Vission::count();
    $data['alldata'] = Vission::all();
    return view('backend.vission.view-vission',$data);
    }

    public function add(){

    	return view('backend.vission.add-vission');
    }
    
     public function store(Request $request){
    	$data = new Vission();
      $data->title = $request->title;
    	$data->created_by = Auth::user()->id;
    	 if ($request->file('image')){
          $file = $request->file('image');
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/postimage'), $filename);
          $data['image'] = $filename;
        }
        if ($request->file('post_file')){
          $file = $request->file('post_file');
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/postfile'), $filename);
          $data['post_file'] = $filename;
        }
    	$data->save();
    	return redirect()->route('vissions.view')->with('success','Vission Inserted Successfully');
    }
        
        public function edit($id){
            $editdata = Vission::find($id);
            return view('backend.vission.edit-vission',compact('editdata'));

        }

        public function update(Request $request,$id){
            $data = Vission::find($id);
            $data->title = $request->title;
            $data->updated_by = Auth::user()->id;
         if ($request->file('image')){
          $file = $request->file('image');
          @unlink(public_path('upload/postimage/'.$data->image));
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/postimage'), $filename);
          $data['image'] = $filename;
        }
         if ($request->file('post_file')){
          $file = $request->file('post_file');
          @unlink(public_path('upload/postfile/'.$data->post_file));
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/postfile'), $filename);
          $data['post_file'] = $filename;
        }
        $data->save();

        return redirect()->route('vissions.view')->with('success','Vission Updated Successfully');

        }

          public function delete($id){
            $vission = Vission::find($id);

          if (file_exists('public/upload/postimage/' . $vission->image) AND !
            empty($vission->image)){
               unlink('public/upload/postimage/' . $vission->image);
       }

       if (file_exists('public/upload/postfile/' . $post->post_file) AND !
            empty($post->post_file)){
               unlink('public/upload/postfile/' . $post->post_file);
       }
            $vission->delete();
            return redirect()->route('vissions.view')->with('success','Vission Deleted Successfully');

          }  
}
