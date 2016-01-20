<?php

class Car extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'make' => 'required|max:255',
		'model' => 'required|max:255',
		'license_number' => 'required|max:255',
		'color' => 'required|max:255'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	public function parkinglots()
	{
		return $this->belongsToMany('ParkingLot');
	}

}