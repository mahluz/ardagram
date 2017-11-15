<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use App\Instagram;
use App\Photo;
use App\User;

class InstagramController extends Controller
{
    public function index(){
    	$data["instagram"] = Instagram::orderBy('id','desc')->first();
    	$data["photo"] = Photo::where('user_id',Auth::user()->id)->get();

    	return view('instagram.index',$data);
    }

    public function play(Request $request){
    	// dd($request);
    	if($request->status == "play"){

	    	$db["instagram"] = Instagram::where('id',1)->update([
	    		"run_at" => $request["run_at"],
	    		"status" => "running"
	    	]);

    	} elseif ($request->status == "stop"){

    		$db["instagram"] = Instagram::where('id',1)->update([
	    		"run_at" => "0",
	    		"status" => "stopped"
	    	]);

    	}

    	return redirect('instagram');
    }

    public function create(Request $request){
    	// dd(Auth::user()->id);
    	if($request->hasFile('photo')){	
    		$path = $request->file('photo')->store(Auth::user()->name);

    		$data["instagram"] = Photo::create([
    			"user_id" => Auth::user()->id,
    			"photo" => Auth::user()->name,
    			"caption" => $request["caption"],
    			"path" => $path,
    			"status" => "waiting"
    		]);

    		return redirect('instagram');
    	}
    	// end if
    }

    public function delete(Request $request){
    	// dd($request);

    	$db["photo"] = Photo::where('id',$request["id"])->delete();

    	$file["photo"] = File::delete('storage/app/'.$request["old_photo"]);

    	return redirect('instagram'); 

    }

}
