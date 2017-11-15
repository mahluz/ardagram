<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Instagram;

class SettingController extends Controller
{
    public function index(){
    	$data["instagram"] = Instagram::orderBy('id','desc')->first();

    	return view('setting.index',$data);
    }

    public function update(Request $request){
    	$data["instagram"] = Instagram::orderBy('id','desc')->first();

    	$db["instagram"] = Instagram::where('id',$data["instagram"]->id)->update([
    		"username"=>$request["username"],
    		"password"=>$request["password"]
    	]);

    	return redirect('setting');

    }
}
