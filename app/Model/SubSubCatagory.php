<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\user;

class SubSubCatagory extends Model
{
    
      protected $fillable = ['catagory_id','sub_catagory_id','sub_sub_catagory_slug','sub_sub_catagory_name'];

      public function catagory(){
      	return $this->belongsTo(Catagory::class, 'catagory_id', 'id');
      }

      public function subcatagory(){
      	return $this->belongsTo(SubCatagory::class, 'sub_catagory_id', 'id');
      }

      public function user(){
      	return $this->belongsTo(user::class, 'id', 'id');
      }
}
