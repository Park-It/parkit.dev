<?php

class ParkingLotsController extends \BaseController {

	/**
	 * Display a listing of parkinglots
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

		return View::make('parking_lots.index', compact('preferred_parking_lots', 'first_name'));
	}

	/**
	 * Show the form for creating a new parkinglot
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('parkinglots.create');
	}

	/**
	 * Store a newly created parkinglot in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Parkinglot::$rules);

		if ($validator->fails())
		{dd($validator->messages());
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$userId = Auth::user()->id;

		$parking_lot_user = new Parkinglotuser();
		$parking_lot_user->parking_lot_id = Input::get('parking-lot-id');
		$parking_lot_user->user_id = $userId;
		$parking_lot_user->save();

		return Redirect::route('parking_lots.index');
	}

	/**
	 * Display the specified parkinglot.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$parkinglot = Parkinglot::findOrFail($id);

		return View::make('parkinglots.show', compact('parkinglot'));
	}

	/**
	 * Show the form for editing the specified parkinglot.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$parkinglot = Parkinglot::find($id);

		return View::make('parkinglots.edit', compact('parkinglot'));
	}

	/**
	 * Update the specified parkinglot in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$parkinglot = Parkinglot::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Parkinglot::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$parkinglot->update($data);

		return Redirect::route('parkinglots.index');
	}

	/**
	 * Remove the specified parkinglot from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// the destroy does not work on these as they do not have an id column, also we need to have conformations that the owner is ther one submiting the request or anyone can edit other peoples data.
		$userId = Auth::user()->id;
		Log::info("userid: {$userId}, preferred parking lot id: {$id} Deleted.");
		$preferredParking = DB::table('parking_lot_users')->where('user_id', $userId)->where("parking_lot_id", $id);
		$preferredParking->delete();
		return Redirect::route('parking_lots.index');
	}

	public function getParkingLot($id)
	{
		$parkinglot = DB::table('parking_lots')->select('id', 'name', 'lat', 'lng', 'address', 'price', 'max_spots')->where('id', $id)->get();
		Log::info($parkinglot);
		$parkinglot = Rating::ratingOrder($parkinglot);
		Log::info($parkinglot);

		return Response::json($parkinglot);
	}

}
