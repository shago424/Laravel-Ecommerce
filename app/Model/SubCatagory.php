<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\user;
use Auth;


class SubCatagory extends Model
{
     
      protected $fillable = ['catagory_id','sub_catagory_name','sub_catagory_slug'];

      public function catagory(){
      	return $this->belongsTo(Catagory::class, 'catagory_id', 'id');
      }


      public function sub_sub_catagoryyy(){
      	return $this->hasMany(SubSubcatagory::class)->where('status',1);
      }




      public function user(){
      	return $this->belongsTo(user::class, 'id', 'id');
      }
}
