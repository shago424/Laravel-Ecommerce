<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     public function catagory(){
    	return $this->belongsTo(Catagory::class,'catagory_id','id');
    }
}
