<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use Intervention\Image\Facades\Image;

use App\User;
use App\Instagram;
use App\Photo;

class InstagramPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'instagram:post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'instagram auto post';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Request $request)
    {
        $data["instagram"] = Instagram::orderBy('id','asc')->first();
        $data["photo"] = Photo::where('id',$data["instagram"]->run_at)->first();

        /////// CONFIG ///////
        $username = $data["instagram"]->username;
        $password = $data["instagram"]->password;
        $debug = false;
        $truncatedDebug = false;
        ////////////////////// 
        /////// MEDIA ////////
        // $photoFile = Image::make(url('ardagram/public/img/demo.jpg'));
        // or
        // $photoFile = File::get('storage/app/public/demo.jpg');
        // or
        // $photoFile = url('ardagram/public/img/demo.jpg');
        // or
        $photoFile = url('ardagram/storage/app/'.$data["photo"]->path);
        // or
        // $photoFile = $request->file('photo'); // work tapi ini upload manual lewat form file

        $captionText = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
        //////////////////////
        $ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);
        try {
            $ig->login($username, $password);
        } catch (\Exception $e) {
            $this->info('Something went wrong: '.$e->getMessage()."\n");
            exit(0);
        }

        // upload code
        if($data["instagram"]->status == "running"){

            try {
                $resizer = new \InstagramAPI\MediaAutoResizer($photoFile);

                $ig->timeline->uploadPhoto($resizer->getFile(), ['caption' => $captionText]);

                Instagram::where('id',1)->update([
                    "run_at" => $data["instagram"]->run_at+1
                ]);

                Photo::where('id',$data["instagram"]->run_at)->update([
                    "status" => "sent"
                ]);

            } catch (\Exception $e) {
                $this->info('Something went wrong: '.$e->getMessage()."\n");
            }
        }
        // end if

        $this->info('photo has been posted');
    }
}
