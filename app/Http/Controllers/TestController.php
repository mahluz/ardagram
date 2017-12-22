<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Instagram;

class TestController extends Controller
{
    public function index(){

    	// dd(Instagram::first());
    	// dd(File::get('storage/app/public/demo.jpg'));

		$data["instagram"] = Instagram::orderBy('id','asc')->first();

        /////// CONFIG ///////
        $username = $data["instagram"]->username;
        $password = $data["instagram"]->password;
		$debug = true;
		$truncatedDebug = false;
		//////////////////////
		/////// MEDIA ////////
		$photoFilename = 'zulham';
		$captionText = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
		//////////////////////
		$ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);
		try {
		    $ig->login($username, $password);
		} catch (\Exception $e) {
		    echo 'Something went wrong: '.$e->getMessage()."\n";
		    exit(0);
		}

		// return Response::json($response->getUser());
		// return Response::json($ig->people->getFollowers($userId));
		// return $response->getUser()->getFollowerCount();
    }
}
