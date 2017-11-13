<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use \InstagramAPI\Instagram;

class MainController extends Controller
{
    public function index(){

		return view('main.index');
    }

    public function upload(Request $request){
    	/////// CONFIG ///////
		$username = 'azwar724';
		$password = 'aamgaul724698';
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
		try {
		    // The most basic upload command, if you're sure that your photo file is
		    // valid on Instagram (that it fits all requirements), is the following:
		    // $ig->timeline->uploadPhoto($photoFilename, ['caption' => $captionText]);
		    // However, if you want to guarantee that the file is valid (correct format,
		    // width, height and aspect ratio), then you can run it through our
		    // automatic media resizer class. It is pretty fast, and only does any work
		    // when the input image file is invalid, so you may want to always use it.
		    // You have nothing to worry about, since the class uses temporary files if
		    // the input needs processing, and it never overwrites your original file.
		    // Also note that it has lots of options, so read its class documentation!
		    $resizer = new \InstagramAPI\MediaAutoResizer($request->file('photo'));
		    $ig->timeline->uploadPhoto($resizer->getFile(), ['caption' => $captionText]);
		} catch (\Exception $e) {
		    echo 'Something went wrong: '.$e->getMessage()."\n";
		}
    }
}

