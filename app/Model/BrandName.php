<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class BrandName extends Model
{
   use SoftDeletes;
   protected $fillable = ['brand_name','brand_slug']; 

   

       public function productss(){
      	return $this->belongsTo(Product::class, 'brand_id', 'id');
      }
}
