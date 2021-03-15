<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Model\Principal;


class PrincipalController extends Controller
{
    public function view(){
   	$data['countmission'] = Principal::count();
    $data['alldata'] = Principal::all();
    return view('backend.principal.view-principal',$data);
    }

    


    public function add(){

    	return view('backend.principal.add-principal');
    }
    
     public function store(Request $request){
    	$data = new Principal();
      $data->title = $request->title;
      $data->short_title = $request->short_title;
    	$data->created_by = Auth::user()->id;
    	 if ($request->file('image')){
          $file = $request->file('image');
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/principalimage'), $filename);
          $data['image'] = $filename;
        }
    	$data->save();
    	return redirect()->route('principals.view')->with('success','Principal Inserted Successfully');
    }
        
        public function edit($id){
            $editdata = Principal::find($id);
            return view('backend.principal.edit-principal',compact('editdata'));

        }

        public function update(Request $request,$id){
            $data = Principal::find($id);
            $data->title = $request->title;
            $data->short_title = $request->short_title;
            $data->updated_by = Auth::user()->id;
         if ($request->file('image')){
          $file = $request->file('image');
          @unlink(public_path('upload/principalimage/'.$data->image));
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/principalimage'), $filename);
          $data['image'] = $filename;
        }
        $data->save();

        return redirect()->route('principals.view')->with('success','Principal Updated Successfully');

        }

          public function delete($id){
            $principal = Principal::find($id);

          if (file_exists('public/upload/principalimage/' . $principal->image) AND !
            empty($principal->image)){
               unlink('public/upload/principalimage/' . $principal->image);
       }
            $principal->delete();
            return redirect()->route('principals.view')->with('success','Principal Deleted Successfully');

          }  
}
