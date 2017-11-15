<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Instagram;
use App\Photo;
use App\User;

class InstagramController extends Controller
{
    public function index(){
    	$data["instagram"] = Instagram::orderBy('id','desc')->first();

    	return view('instagram.index',$data);
    }
}
