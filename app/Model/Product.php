<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Product extends Model
{
		protected $fillable = [
				   'product_name' ,
        		   'product_slug',
		           'catagory_id' ,
		           'sub_catagory_id' ,
		           'sub_sub_catagory_id' ,
		           'brand_id' ,
		           'model' ,
		           'size' ,
		           'quantity' ,
		           'buy_price',
		           'sell_price',
		           'special_price',
		           'special_start' ,
		           'special_end' ,
		           'thumbail' ,
		           'image' ,
		           'video' ,
		           'warranty' , 
		           'warranty_time' ,
		           'warranty_condition' ,
		           'short_des' ,
		           'long_des' ,
		           'status' ,
		           'color' ,
		           'product_id' ,
	];


      public function catagory(){
      	return $this->belongsTo(Catagory::class, 'catagory_id', 'id');
      }

      public function subcatagory(){
      	return $this->belongsTo(SubCatagory::class, 'sub_catagory_id', 'id');
      }

      public function subsubcatagory(){
      	return $this->belongsTo(SubSubCatagory::class, 'sub_sub_catagory_id', 'id');
      }

      public function brand(){
      	return $this->belongsTo(BrandName::class, 'brand_id', 'id');
      }

      

      

      public function user(){
      	return $this->belongsTo(user::class, 'id', 'id');
      }

     

}
