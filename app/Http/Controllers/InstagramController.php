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

    public function upload(Request $request){
    	// dd($request->file('photo'));

    	$data["instagram"] = Instagram::orderBy('id','desc')->first();

    	/////// CONFIG ///////
		$username = $data["instagram"]->username;
		$password = $data["instagram"]->password;
		$debug = false;
		$truncatedDebug = false;
		//////////////////////
		/////// MEDIA ////////
		// $photoFilename = 'zulham';
		$metaData = [
			"caption" => $request["caption"]
		];
		//////////////////////
		$ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);
		try {
		    $ig->login($username, $password);
		} catch (\Exception $e) {
		    echo 'Something went wrong: '.$e->getMessage()."\n";
		    exit(0);
		}
		try {
		   
		    $resizer = new \InstagramAPI\MediaAutoResizer($request->file('photo'));
		    $ig->timeline->uploadPhoto($resizer->getFile(),$metaData);
		} catch (\Exception $e) {
		    echo 'Something went wrong: '.$e->getMessage()."\n";
		}

		return redirect('instagram');

    }

    public function play(Request $request){
    	// dd($request);
    	if($request->status == "play"){

	    	$db["instagram"] = Instagram::where('id',1)->update([
	    		"run_at" => $request["run_at"],
                "end_at" => $request["end_at"],
	    		"status" => "running"
	    	]);

    	} elseif ($request->status == "stop"){

    		$db["instagram"] = Instagram::where('id',1)->update([
	    		"run_at" => "0",
                "end_at" => "0",
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
