<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instagram extends Model
{
    protected $fillable = ['username','password','user_id','status','run_at'];
}
