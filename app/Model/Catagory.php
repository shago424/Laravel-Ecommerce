<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;


class Catagory extends Model
{
   

public function user(){
      	return $this->belongsTo(user::class, 'id', 'id');
      }

      public function sub_catagoryy(){
      	return $this->hasMany(Subcatagory::class)->where('status',1);
      }

      public function sub_sub_catagoryy(){
      	return $this->hasMany(SubSubcatagory::class)->where('status',1);
      }

      
}
