<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('checking',function(){

	switch(Auth::user()->role_id){
		case '1':
			return redirect('main');
		break;
		default:
			return redirect('/');
		break;
	}

});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('test','TestController@index');

Route::group(['middleware'=>'web'],function(){

	Route::group(['middleware'=>'userMiddleware:1'],function(){

		Route::get('main','MainController@index');
		Route::post('upload','MainController@upload');

		Route::get('instagram','InstagramController@index')->name('instagram');
		Route::group(['prefix'=>'instagram'],function(){
			Route::post('play','InstagramController@play');
			Route::post('create','InstagramController@create');
			Route::post('delete','InstagramController@delete');			
		});
		// end instagram group

		Route::get('setting','SettingController@index');
		Route::group(['prefix'=>'setting'],function(){
			Route::post('update','SettingController@update');
		});
		// end setting group

	});
	// end userMiddleware middleware group
	
});
// end middleware web