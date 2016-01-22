<?php

class PreferredParkingLotsController extends \BaseController {

	/**
	 * Display a listing of preferredparkinglots
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::check())
		{
			$userId = Auth::user()->id;
			$preferred_parking_lots = DB::table('preferred_parking_lot_users')->where('user_id', $userId)
    		->join('parking_lots', 'preferred_parking_lot_users.preferred_parking_lot_id', '=', 'id')
    		->paginate(10);
			$first_name = Auth::user()->first_name;
		} 

		return View::make('preferred_parking_lots.index', compact('preferred_parking_lots', 'first_name'));
	}

	/**
	 * Show the form for creating a new preferredparkinglot
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('preferred_parking_lots.create');
	}

	/**
	 * Store a newly created preferredparkinglot in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Preferredparkinglot::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Preferredparkinglot::create($data);

		return Redirect::route('preferred_parking_lots.index');
	}

	/**
	 * Display the specified preferredparkinglot.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$preferredparkinglot = Preferredparkinglot::findOrFail($id);

		return View::make('preferred_parking_lots.show', compact('preferredparkinglot'));
	}

	/**
	 * Show the form for editing the specified preferredparkinglot.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$preferredparkinglot = Preferredparkinglot::find($id);

		return View::make('preferred_parking_lots.edit', compact('preferredparkinglot'));
	}

	/**
	 * Update the specified preferredparkinglot in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$preferredparkinglot = Preferredparkinglot::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Preferredparkinglot::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$preferredparkinglot->update($data);

		return Redirect::route('preferred_parking_lots.index');
	}

	/**
	 * Remove the specified preferredparkinglot from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Preferredparkinglot::destroy($id);

		return Redirect::route('preferred_parking_lots.index');
	}

}
