<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use Intervention\Image\Facades\Image;

use App\User;

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

        /////// CONFIG ///////
        $username = 'azwar724';
        $password = 'aamgaul724698';
        $debug = false;
        $truncatedDebug = false;
        ////////////////////// 
        /////// MEDIA ////////
        // $photoFile = Image::make(url('ardagram/public/img/demo.jpg'));
        // or
        // $photoFile = File::get('storage/app/public/demo.jpg');
        // or
        $photoFile = url('ardagram/public/img/profile.jpg');
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
        try {
            // upload code

            $resizer = new \InstagramAPI\MediaAutoResizer($photoFile);

            $ig->timeline->uploadPhoto($resizer->getFile(), ['caption' => $captionText]);
        } catch (\Exception $e) {
            $this->info('Something went wrong: '.$e->getMessage()."\n");
        }

        $this->info('photo has been posted');
    }
}
