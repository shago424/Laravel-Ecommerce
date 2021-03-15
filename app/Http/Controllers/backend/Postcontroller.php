<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Model\Post;
use App\Model\Catagory;

class Postcontroller extends Controller
{
   public function view(){
    $data['alldata'] = Post::latest()->get();
    return view('backend.post.view-post',$data);
    }

    


    public function add(){
      $catagories = Catagory::where('status',1)->orderby('catagory_name','ASC')->get();
    	return view('backend.post.add-post',compact('catagories'));
    }
    
     public function store(Request $request){
      $data = new Post();
      $data->post_title = $request->post_title;
       $data->short_title = $request->short_title;
      $data->post_details = $request->post_details;
      $data->post_date = $request->post_date;
      $data->catagory_id = $request->catagory_id;
      $data->post_slug = $this->slug_generator($request->post_title);
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
    	return redirect()->route('posts.view')->with('success','Post Inserted Successfully');
    } 
        
        public function edit($id){
            $editdata = Post::find($id);
           $catagories = Catagory::where('status',1)->orderby('catagory_name','ASC')->get();
            return view('backend.post.edit-post',compact('editdata','catagories'));

        }

        public function update(Request $request,$id){
      $data = Post::find($id);
      $data->catagory_id = $request->catagory_id;
      $data->post_date = $request->post_date;
      $data->post_title = $request->post_title;
      $data->short_title = $request->short_title;
      $data->post_details = $request->post_details;
       $data->post_slug = $this->slug_generator($request->post_title);
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

        return redirect()->route('posts.view')->with('success','Post Updated Successfully');

        }

          public function delete($id){
            $post = Post::find($id);

          if (file_exists('public/upload/postimage/' . $post->image) AND !
            empty($post->image)){
               unlink('public/upload/postimage/' . $post->image);
       }

        if (file_exists('public/upload/postfile/' . $post->post_file) AND !
            empty($post->post_file)){
               unlink('public/upload/postfile/' . $post->post_file);
       }
            $post->delete();
            return redirect()->route('posts.view')->with('success','Post Deleted Successfully');

          } 

           public function slug_generator($string){
          $string = str_replace(' ', '-', $string);
            $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
            return strtolower(preg_replace('/-+/', '-', $string));
          }
 
}
