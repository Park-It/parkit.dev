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

	// public function getCar($id)
	// {
	// 	$userId = Auth::user()->id;
	// 	$carData = Car::find($id);
	// 	if ($userId === $carData["user_id"])
	// 	{
	// 		$car = Car::findOrFail($id);

	// 		return Response::json($car);
	// 	}
	// 	else
	// 	{
	// 		return "Access Denied: This is not your car.";
	// 	}
	// }

	public function storeCar()
	{
		$messages = array(
			'make.required' => 'Make field cannot be left empty.',
			'make.max' => 'You must enter a value with a maximum of 255 characters.',
			'model.required' => 'Model field cannot be left empty.',
			'model.max' => 'You must enter a value with a maximum of 255 characters.',
			'license_plate_number.required' => 'License Plate Number field cannot be left empty.',
			'license_plate_number.max' => 'You must enter a value with a maximum of 255 characters.',
			'color.required' => 'Color field cannot be left empty.',
			'color.max' => 'You must enter a value with a maximum of 255 characters.',
		);

		$validator = Validator::make($data = Input::all(), Car::$rules, $messages);

		if ($validator->fails()) {
			return Response::json($validator->messages());
		}

		$car = new Car();
		
		$car->make = Input::get('make');
		$car->model = Input::get('model');
		$car->license_plate_number = Input::get('license_plate_number');
		$car->color = Input::get('color');
		if(Auth::check()) {
			$car->user_id = Auth::user()->id;
		}
		$result = $car->save();
		
		$order = new Order();
		$order->car_id = $car->id;
		$order->parking_lot_id = Input::get('hiddenParkingLot');
		$order->save();

		return Response::json(['success' => true]);
	}

}
