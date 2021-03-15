<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Payment extends Model

{    protected $fillable = [
         'user_id','st_id','name','st_mobile','course', 'method','tid','sent_mobile','amount','status','image',
    ];
}
