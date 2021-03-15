<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Model\Mission;


class MissionController extends Controller
{
   public function view(){
   	$data['countmission'] = Mission::count();
    $data['alldata'] = Mission::all();
    return view('backend.mission.view-mission',$data);
    }

    public function add(){

    	return view('backend.mission.add-mission');
    }
    
     public function store(Request $request){
    	$data = new Mission();
      $data->title = $request->title;
    	$data->created_by = Auth::user()->id;
    	 if ($request->file('image')){
          $file = $request->file('image'); 
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/missionimage'), $filename);
          $data['image'] = $filename;

          if ($request->file('post_file')){
          $file = $request->file('post_file');
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/postfile'), $filename);
          $data['post_file'] = $filename;
        }
        }
    	$data->save();
    	return redirect()->route('missions.view')->with('success','Mission Inserted Successfully');
    }
        
        public function edit($id){
            $editdata = Mission::find($id);
            return view('backend.mission.edit-mission',compact('editdata'));

        }

        public function update(Request $request,$id){
            $data = Mission::find($id);
            $data->title = $request->title;
            $data->updated_by = Auth::user()->id;
         if ($request->file('image')){
          $file = $request->file('image');
          @unlink(public_path('upload/missionimage/'.$data->image));
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/missionimage'), $filename);
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

        return redirect()->route('missions.view')->with('success','Mission Updated Successfully');

        }

          public function delete($id){
            $mission = Mission::find($id);

          if (file_exists('public/upload/missionimage/' . $mission->image) AND !
            empty($mission->image)){
               unlink('public/upload/missionimage/' . $mission->image);
       }

        if (file_exists('public/upload/postfile/' . $mission->post_file) AND !
            empty($mission->post_file)){
               unlink('public/upload/postfile/' . $mission->post_file);
       }
            $mission->delete();
            return redirect()->route('missions.view')->with('success','Mission Deleted Successfully');

          }  
}
