<?php

class UsersController extends \BaseController {

	public function __construct()
	{
		parent::__construct();

		$this->beforeFilter('auth', array('except' => array('index', 'show', 'store')));
	}
	/**
	 * Display a listing of users
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();

		return View::make('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new user
	 *
	 * @return Response
	 */
	public function create()
	{
		return Redirect::route('index');
	}

	/**
	 * Store a newly created user in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// create the validator
    	$validator = Validator::make(Input::all(), User::$rules);
    	// attempt validation
    	if ($validator->fails()) {
        	// validation failed, redirect to the index page with validation errors and old inputs
        	return Redirect::back()->withInput()->withErrors($validator);
    	} else {
    		$car = Car::firstOrFail();
        	// validation succeeded, create and save the user
			$user = new User();
			
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->username = Input::get('username');
			$user->email = Input::get('email');
			$user->password = Input::get('password');
			$user->car_id = $car->id;
			$result = $user->save();

			if($result) {
				Session::flash('successMessage', $user->first_name . ' Thank you for signing up at Park It');
				Auth::attempt(array('email' => $user->email, 'password' => Input::get('password')));
				return Redirect::action('HomeController@showIndex');

			} else {
				Session::flash('errorMessage', 'Please properly input all the required fields');
				Log::warning('Post failed to save: ', Input::all());
				return Redirect::back()->withInput();
			}
    	}

	}

	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);

		return View::make('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if(Auth::check())
		{
			$user = User::find($id);
			$user["name"] = Auth::user()->first_name;
		}

		return View::make('users.edit', compact('user'));
	}

	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::findOrFail($id);

		$validator = Validator::make($data = Input::all(), User::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		} else {
			$user->first_name = Input::get('new_first_name');
			$user->last_name = Input::get('new_last_name');
			$user->username = Input::get('new_username');
			$user->email = Input::get('new_email');
			$user->password = Input::get('new_password');
			$result = $user->save();
		}

		if($result) {
			Session::flash('successMessage', $user->first_name . ' Thank you for signing up at Park It');
			return Redirect::action('HomeController@showIndex');

		} else {
			Session::flash('errorMessage', 'Please properly input all the required fields');
			Log::warning('Post failed to save: ', Input::all());
			return Redirect::back()->withInput();
		}
	}

	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);

		return Redirect::route('users.index');
	}

}
