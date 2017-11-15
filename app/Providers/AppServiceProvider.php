<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Instagram;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['layouts.varello'],function($view){
            $data["status"] = Instagram::orderBy('id','desc')->first();
            // dd($data);
            $view->with($data); 
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
