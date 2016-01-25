<?php

class CarsController extends \BaseController {

	/**
	 * Display a listing of cars
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::check())
		{
			$cars = Auth::user()->cars()->paginate(10);
			$first_name = Auth::user()->first_name;
		} 

		return View::make('cars.index', compact('cars', 'first_name'));
	}

	/**
	 * Show the form for creating a new car
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('cars.create');
	}

	/**
	 * Store a newly created car in storage.
	 *
	 * @return Response
	 */
	public function store()
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

		$validator = Validator::make($data = Input::all(), Car::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		} else {
			$car = new Car();
			
			$car->make = Input::get('make');
			$car->model = Input::get('model');
			$car->license_plate_number = Input::get('license_plate_number');
			$car->color = Input::get('color');
			$car->user_id = Auth::user()->id;
			$result = $car->save();
		}

		if($result) {
			Session::flash('successMessage', 'Thank you for saving your car');
			return Redirect::action('cars.index');

		} else {
			Session::flash('errorMessage', 'Please properly input all the required fields');
			Log::warning('Car failed to save: ', Input::all());
			return Redirect::back()->withInput();
		}
		
	}

	/**
	 * Display the specified car.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$userId = Auth::user()->id;
		$carData = Car::find($id);
		if ($userId ===$carData["user_id"])
		{
			$car = Car::findOrFail($id);

			return View::make('cars.show', compact('car'));
		}
		else
		{
			return "Access Denied: This is not your car.";
		}
	}

	/**
	 * Show the form for editing the specified car.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$car = Car::find($id);

		return View::make('cars.edit', compact('car'));
	}

	/**
	 * Update the specified car in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$userId = Auth::user()->id;
		$carData = Car::find($id);
		if ($userId ===$carData["user_id"])
		{
			$car = Car::findOrFail($id);

			$messages = array(
				'new_make.required' => 'Make field cannot be left empty.',
				'new_make.max' => 'You must enter a value with a maximum of 255 characters.',
				'new_model.required' => 'Model field cannot be left empty.',
				'new_model.max' => 'You must enter a value with a maximum of 255 characters.',
				'new_license_plate_number.required' => 'License Plate Number field cannot be left empty.',
				'new_license_plate_number.max' => 'You must enter a value with a maximum of 255 characters.',
				'new_color.required' => 'Color field cannot be left empty.',
				'new_color.max' => 'You must enter a value with a maximum of 255 characters.',
			);

			$validator = Validator::make($data = Input::all(), Car::$new_rules, $messages);

			if ($validator->fails())
			{
				return Redirect::back()->withErrors($validator)->withInput();
			} else {
				$car->make = Input::get('new_make');
				$car->model = Input::get('new_model');
				$car->license_plate_number = Input::get('new_license_plate_number');
				$car->color = Input::get('new_color');
				$result = $car->save();
			}

			if($result) {
				Session::flash('successMessage', 'Your vehicle was successfully updated');
				return Redirect::route('cars.index');

			} else {
				Session::flash('errorMessage', 'Please properly input all the required fields');
				Log::warning('Vehicle failed to save: ', Input::all());
				return Redirect::back()->withInput();
			}
		}
		else
		{
			return "Access Denied: this is not your car.";
		}
	}

	/**
	 * Remove the specified car from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$userId = Auth::user()->id;
		$carData = Car::find($id);
		if ($userId ===$carData["user_id"])
		{
			Log::info("userid: {$userId}, car: $id Deleted.");
			$carParking = DB::table('car_parking_lots')->where('car_id', $id);
			$carParking->delete();
			Car::destroy($id);

			return Redirect::route('cars.index');
		}
		else
		{
			return "Access Denied: this is not your car.";
		}
	}

}
