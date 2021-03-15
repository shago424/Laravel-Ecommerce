<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User; 
use Auth;
use App\Model\Video;

class VideoController extends Controller
{
    public function view(){
    $data['alldata'] = Video::all();
    return view('backend.video.view-video',$data);
    }

    public function add(){

    	return view('backend.video.add-video');
    }
    
     public function store(Request $request){
    	$data = new Video();
      $data->title = $request->title;
    	$data->created_by = Auth::user()->id;
    	 if ($request->file('image')){
          $file = $request->file('image');
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/video'), $filename);
          $data['image'] = $filename;
        }
    	$data->save();
    	return redirect()->route('videos.view')->with('success','Video Inserted Successfully');
    }
        
        public function edit($id){
            $editdata = Video::find($id);
            return view('backend.video.edit-video',compact('editdata'));

        }

        public function update(Request $request,$id){
            $data = Video::find($id);
            $data->title = $request->title;
            $data->updated_by = Auth::user()->id;
         if ($request->file('image')){
          $file = $request->file('image');
          @unlink(public_path('upload/image/'.$data->image));
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/image'), $filename);
          $data['image'] = $filename;
        }
        $data->save();

        return redirect()->route('videos.view')->with('success','Video Updated Successfully');

        }

          public function delete($id){
            $video = Video::find($id);

          if (file_exists('public/upload/video/' . $video->image) AND !
            empty($video->image)){
               unlink('public/upload/video/' . $video->image);
       }
            $video->delete();
            return redirect()->route('photos.view')->with('success','Video Deleted Successfully');

          }  
}
