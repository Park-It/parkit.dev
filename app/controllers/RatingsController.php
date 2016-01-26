<?php

class RatingsController extends BaseController {

	/**
	 * Display a listing of ratings
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::check())
		{
			$first_name = Auth::user()->first_name;
			$userId = Auth::user()->id;
			$parking_lots = DB::table('ratings')->where('user_id', $userId)
    		->join('parking_lots', 'parking_lots.id', '=', 'parking_lot_id')
    		->select('ratings.*', 'parking_lots.name')
    		->paginate(10);
		} 
		
		return View::make('ratings.index', compact('first_name', 'parking_lots'));
	}

	/**
	 * Show the form for creating a new rating
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('ratings.create');
	}

	/**
	 * Store a newly created rating in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Rating::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Rating::create($data);

		return Redirect::route('ratings.index');
	}

	/**
	 * Display the specified rating.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$rating = Rating::findOrFail($id);

		return View::make('ratings.show', compact('rating'));
	}

	/**
	 * Show the form for editing the specified rating.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$userId = Auth::user()->id;
		$ratingData = Rating::find($id);
		if ($userId === $ratingData["user_id"])
		{
			$rating = Rating::find($id);

			return View::make('ratings.edit', compact('rating'));
		}
		else
		{
			return "Access Denied: this is not your rating.";
		}
	}

	/**
	 * Update the specified rating in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$userId = Auth::user()->id;
		$ratingData = Rating::find($id);
		if ($userId === $ratingData["user_id"])
		{
			$rating = Rating::findOrFail($id);

			$messages = array(
				'new_stars.required' => 'We need to know how many stars you wish to give!',
				'new_stars.max' => 'You must enter a value with a maximum of 10 characters.',
				'new_comment.max' => 'You must enter a value with a maximum of 255 characters.',
				'new_recommended.max' => 'You must enter a value with a maximum of 255 characters.',
			);
			
			$validator = Validator::make($data = Input::all(), Rating::$new_rules, $messages);

			if ($validator->fails())
			{
				return Redirect::back()->withErrors($validator)->withInput();
			} else {
				$rating->stars = Input::get('new_stars');
				$rating->comment = Input::get('new_comment');
				$rating->recommended = Input::get('new_recommended');
				$result = $rating->save();
			}

			if($result) {
				Session::flash('successMessage', 'Your rating was successfully updated');
				return Redirect::route('ratings.index');

			} else {
				Session::flash('errorMessage', 'Please properly input all the required fields');
				Log::warning('Rating failed to save: ', Input::all());
				return Redirect::back()->withInput();
			}
		}
		else
		{
			return "Access Denied: this is not your rating.";
		}
	}

	/**
	 * Remove the specified rating from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$userId = Auth::user()->id;

		Log::info($userId);
		if ($userId === $id)

		$ratingData = Rating::find($id);
		if ($userId === $ratingData["user_id"])

		{
			Rating::destroy($id);
			Log::info("rating id: {$id} deleted");
			return Redirect::route('ratings.index');
		}
		else
		{
			return "Access Denied: this is not your rating.";
		}
	}
	//returns the average stars given to lot $id from the last 1000 ratings
	public function averageRating($id)
	{
		//selects last 1000 ratings
		$stars = DB::table('ratings')->select('stars')->where('parking_lot_id', $id)->orderBy('id', 'desc')->take(1000)->get();
		if(isset($stars[0]->stars))
		{
			$i = 0;
			$t = 0;
			//get the divisor and the total number of stars
			foreach ($stars as $key => $value)
			{
				$i++;
				$t = $t+$value->stars;
			}
			//find the average rating and round to the nearest 100th place
			$a = $t/$i;
			$average = round($a, 2);
			Log::info("Average rating for lot Id: {$id} is : {$average}");
			return $average;
		}
		else 
		{
			return false;
		}
	}
	public function ratingOrder($data) //reorganizes data to be top stared first - returns array of objects 
	{
		if (isset($data))
		{
			foreach ($data as $key => $value)
			{
				if($rating = $this->averageRating($value->id))
				{
				$value->average_rating = $rating;
				$averaged[strval($rating)."-{$key}"] = $value;
				}
				else
				{
					$value->average_rating = null;
					$averaged["5-{$key}"] = $value;
				}
			}
			krsort($averaged);
			$sorted = array_values($averaged);
			return $sorted;
		}
	}
	public function test($var = null)
	{

	}
}