<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
      protected $fillable = [
        'title', 'sub_title', 'image','url', 'start', 'end','status',
    ];

}
