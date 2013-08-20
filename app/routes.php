<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@home');

Route::get('presentations', 'PresentationController@index');
Route::get('presentations/{slug}/slides', 'SlideController@index');
Route::get('presentations/{slug}/slides/{number}', 'SlideController@show');

Route::group(array('before' => 'auth'), function() {
  Route::resource('presentations', 'PresentationController');
  Route::resource('presentations/{slug}/slides', 'SlideController');
});
