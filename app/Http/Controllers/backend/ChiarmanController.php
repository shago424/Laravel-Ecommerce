<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Model\Chiarman;

class ChiarmanController extends Controller
{
    public function view(){
   	$data['countmission'] = Chiarman::count();
    $data['alldata'] = Chiarman::all();
    return view('backend.chiarman.view-chiarman',$data);
    }

    


    public function add(){

    	return view('backend.chiarman.add-chiarman');
    }
    
     public function store(Request $request){
    	$data = new Chiarman();
      $data->title = $request->title;
      $data->short_title = $request->short_title;
    	$data->created_by = Auth::user()->id;
    	 if ($request->file('image')){
          $file = $request->file('image');
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/chiarmanimage'), $filename);
          $data['image'] = $filename;
        }
    	$data->save();
    	return redirect()->route('chiarmans.view')->with('success','Chiarman Inserted Successfully');
    }
        
        public function edit($id){
            $editdata = Chiarman::find($id);
            return view('backend.chiarman.edit-chiarman',compact('editdata'));

        }

        public function update(Request $request,$id){
            $data = Chiarman::find($id);
            $data->title = $request->title;
            $data->short_title = $request->short_title;
            $data->updated_by = Auth::user()->id;
         if ($request->file('image')){
          $file = $request->file('image');
          @unlink(public_path('upload/chiarmanimage/'.$data->image));
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/chiarmanimage'), $filename);
          $data['image'] = $filename;
        }
        $data->save();

        return redirect()->route('chiarmans.view')->with('success','Chiarman Updated Successfully');

        }

          public function delete($id){
            $chiarman = Chiarman::find($id);

          if (file_exists('public/upload/chiarmanimage/' . $chiarman->image) AND !
            empty($chiarman->image)){
               unlink('public/upload/chiarmanimage/' . $chiarman->image);
       }
            $chiarman->delete();
            return redirect()->route('chiarmans.view')->with('success','Chiarman Deleted Successfully');

          }  
}
