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

Route::get('/', 'HomeController@index');

Route::get('/dashboard', 'HomeController@dashboard');

// SMS
Route::get('/sms', 'HomeController@sms');
Route::post('/sms', 'HomeController@smsSubmit');

// Email
Route::get('/email', 'HomeController@email');
Route::post('/email', 'HomeController@emailSubmit');

// Social Networks
Route::get('/social-networks', 'HomeController@socialNetworks');

// Chikka Routes
Route::post('/receiver', 'HomeController@chikkaReceiver');
