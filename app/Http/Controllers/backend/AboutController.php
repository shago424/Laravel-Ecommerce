<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Model\About;

class AboutController extends Controller
{
    public function view(){
        $data['countabout'] = About::count();
    $data['alldata'] = About::all();
    return view('backend.about.view-about',$data);
    }

    public function add(){

    	return view('backend.about.add-about');
    }
    
     public function store(Request $request){
    	$data = new About();
    	$data->details =$request->details;
    	$data->created_by = Auth::user()->id;
    	 
    	$data->save();
    	return redirect()->route('abouts.view')->with('success','About Inserted Successfully');
    }
        
        public function edit($id){
            $editdata = About::find($id);
            return view('backend.about.edit-about',compact('editdata'));

        }

        public function update(Request $request,$id){
            $data = About::find($id);
            $data->details =$request->details;
            $data->updated_by = Auth::user()->id;
         
        $data->save();

        return redirect()->route('abouts.view')->with('success','About Updated Successfully');

        }

          public function delete($id){
            $about = About::find($id);
        
            $about->delete();
            return redirect()->route('abouts.view')->with('success','About Deleted Successfully');

          }  
}
