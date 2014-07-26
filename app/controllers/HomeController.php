<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	protected $layout = 'layouts.main';

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function index()
	{
		return View::make('landing_page');
	}

	public function dashboard()
	{
		return View::make('dashboard');
	}

	public function sms()
	{
		return View::make('sms');
	}
}
