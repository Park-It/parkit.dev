<?php

class Rating extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'stars' => 'required|max:10',
		'comment' => 'max:255',
		'recommended' => 'max:255'
	];

	// Don't forget to fill this array
	protected $fillable = [];


	public function parkinglots()
	{
		return $this->hasMany('ParkingLot');
	}

}