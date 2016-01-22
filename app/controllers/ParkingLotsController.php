<?php

class ParkingLotsController extends \BaseController {

	/**
	 * Display a listing of parkinglots
	 *
	 * @return Response
	 */
	public function index()
	{
		$parkinglots = Parkinglot::all();

		return View::make('parkinglots.index', compact('parkinglots'));
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
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Parkinglot::create($data);

		return Redirect::route('parkinglots.index');
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
		Parkinglot::destroy($id);

		return Redirect::route('parkinglots.index');
	}

}
