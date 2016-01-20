<?php

class CarsController extends \BaseController {

	/**
	 * Display a listing of cars
	 *
	 * @return Response
	 */
	public function index()
	{
		$cars = Car::all();

		return View::make('cars.index', compact('cars'));
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
		$validator = Validator::make($data = Input::all(), Car::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		} else {
			$car = new Car();
			
			$car->make = Input::get('first_name');
			$car->model = Input::get('last_name');
			$car->license_number = Input::get('username');
			$car->color = Input::get('email');
			$result = $car->save();
		}

		if($result) {
				Session::flash('successMessage', $user->first_name . ' Thank you for saving your car');
				return Redirect::action('car.index');

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
		$car = Car::findOrFail($id);

		return View::make('cars.show', compact('car'));
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
		$car = Car::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Car::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$car->update($data);

		return Redirect::route('cars.index');
	}

	/**
	 * Remove the specified car from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Car::destroy($id);

		return Redirect::route('cars.index');
	}

}
