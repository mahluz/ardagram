<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use \InstagramAPI\Instagram;

use App\Instagram;
use App\User;
use App\Photo;

class MainController extends Controller
{
    public function index(){
    	$data["instagram"] = Instagram::orderBy('id','desc')->first();

    	// CONFIG
    	$username = $data["instagram"]->username;
		$password = $data["instagram"]->password;
		$debug = false;
		$truncatedDebug = false;

		// media
		$metaData = [
			"caption"=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
		];

		//login to instagram
		$ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);
		try {
		    $ig->login($username, $password);
		} catch (\Exception $e) {
		    echo 'Something went wrong: '.$e->getMessage()."\n";
		    exit(0);
		}

		$data["account"] = $ig->people->getInfoById($ig->account_id);

		// dd($data["account"]->user);

		return view('main.index',$data);
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
		$captionText = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
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
		    $ig->timeline->uploadPhoto($resizer->getFile(), ['caption' => $captionText]);
		} catch (\Exception $e) {
		    echo 'Something went wrong: '.$e->getMessage()."\n";
		}

		return redirect('main');
    }
}

