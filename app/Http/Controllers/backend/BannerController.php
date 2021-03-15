<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use App\User;
use Auth;
use App\Model\Banner;

class BannerController extends Controller
{
    public function view(){
    $data['countbanner'] = Banner::count();
    $data['alldata'] = Banner::all();
    return view('backend.banner.view-banner',$data);
    }

    public function add(){

    	return view('backend.banner.add-banner');
    }
    
     public function store(Request $request){
    	$data = new Banner();
    	$data->created_by = Auth::user()->id;
    	 if ($request->file('image')){
          $file = $request->file('image');
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/bannerimage'), $filename);
          $data['image'] = $filename;
        }
    	$data->save();
    	return redirect()->route('banners.view')->with('success','Banner Inserted Successfully');
    }
        
        public function edit($id){
            $editdata = Banner::find($id);
            return view('backend.banner.edit-banner',compact('editdata'));

        }

        public function update(Request $request,$id){
            $data = Banner::find($id);
            $data->updated_by = Auth::user()->id;
         if ($request->file('image')){
          $file = $request->file('image');
          @unlink(public_path('upload/bannerimage/'.$data->image));
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/bannerimage'), $filename);
          $data['image'] = $filename;
        }
        $data->save();

        return redirect()->route('banners.view')->with('success','Banner Updated Successfully');

        }

          public function delete($id){
            $banner = Banner::find($id);

          if (file_exists('public/upload/bannerimage/' . $banner->image) AND !
            empty($banner->image)){
               unlink('public/upload/bannerimage/' . $banner->image);
       }
            $banner->delete();
            return redirect()->route('banners.view')->with('success','Banner Deleted Successfully');

          }  
}
