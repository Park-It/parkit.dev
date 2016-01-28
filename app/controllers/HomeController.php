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

	public function showIndex()
	{
		$parking_lots = ParkingLot::all();
		return View::make('index');
	}

	public function showIndexJson()
	{
		// $parking_lots = ParkingLot::all();
		$lots_array = [];
		$parking_lots = DB::table('parking_lots')->select('id', 'name', 'lat', 'lng', 'address', 'price', 'max_spots')->get();
		// $ratings = new RatingsController();
		$parking_lots = Rating::ratingOrder($parking_lots);
		Log::info($parking_lots);
		
		return Response::json($parking_lots);
	}

	public function getLogin()
	{
		return View::make('index');
	}

	public function postLogin()
	{
		$email = Input::get('email');
		$password = Input::get('password');

		if (Auth::attempt(array('email' => $email, 'password' => $password))) {
    		return Redirect::action('HomeController@showIndex');
		} else {
    		// login failed, go back to the login screen
    		Session::flash('errorMessage', 'Login Failed');
    		return Redirect::back();
		}
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::action('HomeController@showIndex');
	}

	public function getUserCars()
	{
		$cars = Auth::user()->cars()->select(['id', 'make', 'model'])->get();
		return Response::json($cars);
	}

}
