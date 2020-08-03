<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@show');
Route::get('inscricoes', 'WelcomeController@inscricoes');
Route::get('/home', 'HomeController@show');
Route::get('/connect', 'HomeController@connect');
Route::get('/connected', 'HomeController@connected');

Route::resource('videos', 'VideoController');
Route::resource('users', 'UserController');
Route::resource('technologies', 'TechnologyController');
Route::resource('services', 'ServiceController');

Route::get('follow/{user}', 'FollowController@follow')->middleware('auth');
Route::get('unfollow/{user}', 'FollowController@unfollow')->middleware('auth');

Route::get('checkin/{technology}', 'CheckinController@checkin')->middleware('auth');
Route::get('callback/upwork', 'UpworkController@getToken');
Route::post('callback/upwork', 'UpworkController@getToken');

Route::get('upwork/info', 'UpworkController@getInfo');
Route::get('upwork/jobs', 'UpworkController@jobs');
/*
Route::post('callback/upwork', function(){
    return 'Upwork';
});
*/
Route::get('info', function(){
    return phpinfo();
});
