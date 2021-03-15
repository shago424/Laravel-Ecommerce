<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Model\History;


class HistoryController extends Controller
{
   public function view(){
   	$data['countmission'] = History::count();
    $data['alldata'] = History::all();
    return view('backend.history.view-history',$data);
    }

    


    public function add(){

    	return view('backend.history.add-history');
    }
    
     public function store(Request $request){
    	$data = new History();
      $data->title = $request->title;
      $data->short_title = $request->short_title;
    	$data->created_by = Auth::user()->id;
    	 if ($request->file('image')){
          $file = $request->file('image');
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/historyimage'), $filename);
          $data['image'] = $filename;
        }
    	$data->save();
    	return redirect()->route('histories.view')->with('success','History Inserted Successfully');
    }
        
        public function edit($id){
            $editdata = History::find($id);
            return view('backend.history.edit-history',compact('editdata'));

        }

        public function update(Request $request,$id){
            $data = History::find($id);
            $data->title = $request->title;
            $data->short_title = $request->short_title;
            $data->updated_by = Auth::user()->id;
         if ($request->file('image')){
          $file = $request->file('image');
          @unlink(public_path('upload/historyimage/'.$data->image));
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/historyimage'), $filename);
          $data['image'] = $filename;
        }
        $data->save();

        return redirect()->route('histories.view')->with('success','History Updated Successfully');

        }

          public function delete($id){
            $history = History::find($id);

          if (file_exists('public/upload/historyimage/' . $history->image) AND !
            empty($history->image)){
               unlink('public/upload/historyimage/' . $history->image);
       }
            $history->delete();
            return redirect()->route('histories.view')->with('success','History Deleted Successfully');

          }  
}
