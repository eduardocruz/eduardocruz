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

Route::get('follow/{user}', 'FollowController@follow');
