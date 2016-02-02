<?php

class ParkingLotUsersController extends \BaseController {

	/**
	 * Display a listing of parkinglotusers
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::check())
		{
			$userId = Auth::user()->id;
			$preferred_parking_lots = DB::table('parking_lot_users')->where('user_id', $userId)
    		->join('parking_lots', 'parking_lot_users.parking_lot_id', '=', 'id')
    		->paginate(10);
			$first_name = Auth::user()->first_name;
		} 
		// $parkinglots = Parkinglot::all();

		return View::make('parking_lot_users.index', compact('preferred_parking_lots', 'first_name'));
	}

	/**
	 * Show the form for creating a new parkinglotuser
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('parkinglotusers.create');
	}

	/**
	 * Store a newly created parkinglotuser in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Parkinglotuser::$rules);

		if ($validator->fails())
		{dd($validator->messages());
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$userId = Auth::user()->id;

		$parking_lot_user = new Parkinglotuser();
		$parking_lot_user->parking_lot_id = Input::get('parking-lot-id');
		$parking_lot_user->user_id = $userId;
		$parking_lot_user->save();

		return Redirect::route('orders.index');
	}

	/**
	 * Display the specified parkinglotuser.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$parkinglotuser = Parkinglotuser::findOrFail($id);

		return View::make('parkinglotusers.show', compact('parkinglotuser'));
	}

	/**
	 * Show the form for editing the specified parkinglotuser.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$parkinglotuser = Parkinglotuser::find($id);

		return View::make('parkinglotusers.edit', compact('parkinglotuser'));
	}

	/**
	 * Update the specified parkinglotuser in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$parkinglotuser = Parkinglotuser::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Parkinglotuser::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$parkinglotuser->update($data);

		return Redirect::route('parkinglotusers.index');
	}

	/**
	 * Remove the specified parkinglotuser from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Parkinglotuser::destroy($id);

		return Redirect::route('parkinglotusers.index');
	}

}
