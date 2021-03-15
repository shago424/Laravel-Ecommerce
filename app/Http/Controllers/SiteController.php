<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth; 
use App\User;
use App\Model\Catagory;
use App\Model\SubCatagory;
use App\Model\SubSubCatagory;
use App\Model\BrandName;
use App\Model\Product;
use App\Model\Slider;

class SiteController extends Controller
{
    public function index(){
        $hotdeals = Product::where('status',1)->latest()->get();
         $specialoffers = Product::where('status',1)->latest()->get();
           $specialdeals = Product::where('status',1)->latest()->get();
    	$catagories = Catagory::where('status',1)->latest()->limit(10)->get();
    	$catagoriess = Catagory::with('sub_catagoryy')->where('status',1)->latest()->limit(10)->get();
    	$sliders = Slider::where('status',1)->get();
    	
        $newproducts = Product::where('status',1)->latest()->get();
        $featureds = Product::where('status',1)->latest()->get();
        $bestproducts = Product::where('status',1)->where('color','Best Seller')->latest()->get();
        $brands = BrandName::with('productss')->where('status',1)->where('status',1)->latest()->limit(10)->get();
         $products = Product::where('status',1)->latest()->get();
        $cats = Catagory::where('status',1)->latest()->limit(8)->get();
        
    	return view('website.home',compact('catagories','brands','catagoriess','sliders','products','cats','newproducts','featureds','bestproducts','hotdeals','specialdeals','specialoffers'));
    }

    public function catagory($slug){
        $id = SubCatagory::where('sub_catagory_slug',$slug)->pluck('id');
    	$catagories = Catagory::where('status',1)->latest()->limit(10)->get();
    	$catagoriess = Catagory::with('sub_catagoryy')->where('status',1)->latest()->limit(10)->get();
    	$sliders = Slider::get();
    	$brands = BrandName::limit(10)->where('status',1)->latest()->get();
        $products = Product::where('sub_catagory_id',$id)->where('status',1)->get();
    	return view('website.catagory',compact('catagories','sliders','brands','catagoriess','products'));
    }

     

     public function product($slug){
         $id = Product::where('product_slug',$slug)->pluck('id');
    	$catagories = Catagory::with('sub_catagoryy')->where('status',1)->latest()->limit(10)->get();
    	$catagoriess = Catagory::with('sub_catagoryy')->where('status',1)->latest()->limit(10)->get();
    	$sliders = Slider::get();
    	$brands = BrandName::limit(10)->where('status',1)->latest()->get();
    	 $product = Product::where('id',$id)->where('status',1)->first();
          $products = Product::where('status',1)->latest()->get();
    	return view('website.product_details',compact('catagories','sliders','brands','catagoriess','product','products'));
    }

    public function brand($slug){
        $id = BrandName::where('brand_slug',$slug)->pluck('id');
        $catagories = Catagory::with('sub_catagoryy')->where('status',1)->latest()->limit(10)->get();
        $catagoriess = Catagory::with('sub_catagoryy')->where('status',1)->latest()->limit(10)->get();
        $sliders = Slider::get();
        $brands = BrandName::where('status',1)->latest()->get();
        $products = Product::where('brand_id',$id)->where('status',1)->get();
        return view('website.brand',compact('catagories','sliders','catagoriess','brands','products'));
    }

      public function catagoryb($slug){
        $id = Catagory::where('catagory_slug',$slug)->pluck('id');
        $catagories = Catagory::where('status',1)->latest()->limit(10)->get();
        $catagoriess = Catagory::with('sub_catagoryy')->where('status',1)->latest()->limit(10)->get();
        $sliders = Slider::get();
        $brands = BrandName::limit(10)->where('status',1)->latest()->get();
        $products = Product::where('catagory_id',$id)->where('status',1)->get();
        return view('website.catagory',compact('catagories','sliders','brands','catagoriess','products'));
    }
}