<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Model\Contact;
use App\Model\Comm;

class ContactController extends Controller
{
     public function view(){
     $data['countcontact'] = Contact::count();
    $data['alldata'] = Contact::all();
    return view('backend.contact.view-contact',$data);
    }

    public function add(){

    	return view('backend.contact.add-contact');
    }
    
     public function store(Request $request){
      $data = new Contact();
      $data->address = $request->address;
      $data->mobile = $request->mobile;
      $data->email = $request->email;
      $data->facebook = $request->facebook;
      $data->twitter = $request->twitter;
      $data->youtube = $request->youtube;
      $data->googleplus = $request->googleplus;
      $data->created_by = Auth::user()->id;
      $data->save();
    	return redirect()->route('contacts.view')->with('success','Contact Inserted Successfully');
    }
        
        public function edit($id){
            $editdata = Contact::find($id);
            return view('backend.contact.edit-contact',compact('editdata'));

        }

        public function update(Request $request,$id){

      $data = Contact::find($id);
      $data->address = $request->address;
      $data->mobile = $request->mobile;
      $data->email = $request->email;
      $data->facebook = $request->facebook;
      $data->twitter = $request->twitter;
      $data->youtube = $request->youtube;
      $data->googleplus = $request->googleplus;
      $data->updated_by = Auth::user()->id;
      $data->save();

        return redirect()->route('contacts.view')->with('success','Contact Updated Successfully');

        }

          public function delete($id){
            $contact = contact::find($id);
            $contact->delete();
            return redirect()->route('contacts.view')->with('success','Contact Deleted Successfully');

          } 

           public function viewcommunicate(){
    $alldata = Comm::orderBy('id','desc')->get();
    return view('backend.contact.view-communicate',compact('alldata'));
    }

     public function deletecommunicate($id){
            $commuinicate = Comm::find($id);
            $commuinicate->delete();
            return redirect()->route('contacts.communicate')->with('success','Commuinicate Deleted Successfully');

          } 
}
