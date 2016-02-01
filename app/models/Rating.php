<?php

class Rating extends BaseModel {

	// Add your validation rules here
	public static $rules = [
		'stars' => 'required|between:1,1|numeric',
		'comment' => 'max:255',
		'recommended' => 'max:255'
	];

	public static $new_rules = [
		'new_stars' => 'required|max:10',
		'new_comment' => 'max:255',
		'new_recommended' => 'max:255'
	];


	// Don't forget to fill this array
	protected $fillable = [];


	public function parkinglots()
	{
		return $this->hasMany('ParkingLot');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}

	public static function ratingOrder($data)
	{
		if (isset($data))
		{
			foreach ($data as $key => $value)
			{
				if($rating = self::averageRating($value->id))
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

	public static function averageRating($id)
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

}