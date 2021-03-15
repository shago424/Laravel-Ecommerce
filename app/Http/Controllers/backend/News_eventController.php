<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use App\User;
use Auth;
use App\Model\News_event;
class News_eventController extends Controller
{
    public function view(){
    $data['alldata'] = News_event::all();
    return view('backend.news_event.view-news_event',$data);
    }

    public function add(){

    	return view('backend.news_event.add-news_event');
    }
    
     public function store(Request $request){
    	 $data = new News_event();
    	 $data->date = date('Y-m-d',strtotime($request->date));
      	 $data->short_title = $request->short_title;
    	 $data->long_title = $request->long_title;
    	 $data->created_by = Auth::user()->id;
    	 if ($request->file('image')){
          $file = $request->file('image');
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/news_eventimage'), $filename);
          $data['image'] = $filename;
        }
    	$data->save(); 
    	return redirect()->route('news_events.view')->with('success','News Events Inserted Successfully');
    }
        
        public function edit($id){
            $editdata = News_event::find($id);
            return view('backend.news_event.edit-news_event',compact('editdata'));

        }

        public function update(Request $request,$id){
            $data = News_event::find($id);
            $data->date = date('Y-m-d',strtotime($request->date));
            $data->short_title = $request->short_title;
            $data->long_title = $request->long_title;
            $data->updated_by = Auth::user()->id;
         if ($request->file('image')){
          $file = $request->file('image');
          @unlink(public_path('upload/news_eventimage/'.$data->image));
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/news_eventimage'), $filename);
          $data['image'] = $filename;
        }
        $data->save();

        return redirect()->route('news_events.view')->with('success','News  Events Updated Successfully');

        }

          public function delete($id){
            $news_event = News_event::find($id);

          if (file_exists('public/upload/news_eventimage/' . $news_event->image) AND !
            empty($news_event->image)){
               unlink('public/upload/news_eventimage/' . $news_event->image);
       }
            $news_event->delete();
            return redirect()->route('news_events.view')->with('success','News Events Deleted Successfully');

          } 
}
