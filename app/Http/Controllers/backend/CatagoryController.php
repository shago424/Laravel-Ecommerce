<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Catagory; 
use Auth;
use App\user;


class CatagoryController extends Controller

{

 

    public function view(){
    	$catagory['catagories'] = Catagory::all();
    	return view('backend.catagory.view',$catagory);
    }

    

     public function store(Request $request){
     	$request->validate([
     		'catagory_name' => 'required|unique:catagories,catagory_name'
     	]);
     	$catagory = new Catagory();
     	$catagory->catagory_name = $request->catagory_name;
        $catagory->catagory_slug = $this->slug_generator($request->catagory_name);
     	$catagory->created_by = Auth::user()->id;
     	$catagory->save();
    	return redirect()->back()->with('success','Catagory Added Successfully');;
    }

     public function slug_generator($string){
            $string = str_replace(' ', '-', $string);
            $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
            return strtolower(preg_replace('/-+/', '-', $string));
          }

    public function edit($id){
    	$catagories = Catagory::find($id);
    	return view('backend.catagory.edit',compact('catagories'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'catagory_name' => 'required|unique:catagories,catagory_name'
        ]);

     	$catagory = Catagory::find($id);
     	$catagory->catagory_name = $request->catagory_name;
        $catagory->catagory_slug = $this->slug_generator($request->catagory_name);
     	$catagory->updated_by = Auth::user()->id;
     	$catagory->save();

    	 return redirect()->route('catagory.view')->with('update','Catagory Updated Successfully');
    }

     public function delete($id){
            $catagory = catagory::find($id);

         
            $catagory->delete();
            return redirect()->route('catagory.view')->with('delete','Catagory Deleted Successfully');
 
          }  

          public function inactive(Request  $request,$id){
            $catagory = catagory::find($id);
            $catagory->status = $request->status = 0;
            $catagory->save();
            return redirect()->route('catagory.view')->with('inactive','Catagory Inactive Successfully');
          }

          public function active(Request  $request,$id){
            $catagory = catagory::find($id);
            $catagory->status = $request->status = 1;
            $catagory->save();
            return redirect()->route('catagory.view')->with('active','Catagory Active Successfully');
          }
}
