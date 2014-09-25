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

	public function showLogin()
	{
		return View::make('login');
	}


	public function doLogin()
	{

		if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'))))
		{
    		Session::flash('successLoginMessage', 'You are now logged in.');
    		return Redirect::action('AdminController@index');
		}
		else
		{
			Session::flash('errorLoginMessage', 'Either your username or password are incorrect.');
			return Redirect::back()->withInput();
		}
	}	

	public function logout()
	{
		Auth::logout();
		Session::flash('successLogoutMessage', 'You are now logged out. See you next time!');
		return Redirect::action('RoomsController@index');
	}

}