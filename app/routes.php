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

// homepage
Route::get('/', 'HomeController@home');

// auth stuff
Route::get('login', 'AuthController@login');
Route::post('login', array('before' => 'csrf', 'uses' => 'AuthController@authenticate'));
Route::get('logout', 'AuthController@logout');

// routes to resourceful controllers
Route::resource('presentations', 'PresentationController',
  array('only' => array('index', 'create', 'store', 'destroy')));
Route::resource('presentations/{slug}/slides', 'SlideController',
  array('only' => array('index', 'store', 'show', 'edit', 'update', 'destroy')));
