<?php

class PreferredParkingLotsController extends \BaseController {

	/**
	 * Display a listing of preferredparkinglots
	 *
	 * @return Response
	 */
	public function index()
	{
		$preferredparkinglots = Preferredparkinglot::all();

		return View::make('preferredparkinglots.index', compact('preferredparkinglots'));
	}

	/**
	 * Show the form for creating a new preferredparkinglot
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('preferredparkinglots.create');
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

		return Redirect::route('preferredparkinglots.index');
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

		return View::make('preferredparkinglots.show', compact('preferredparkinglot'));
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

		return View::make('preferredparkinglots.edit', compact('preferredparkinglot'));
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

		return Redirect::route('preferredparkinglots.index');
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

		return Redirect::route('preferredparkinglots.index');
	}

}
