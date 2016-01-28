<?php

class Car extends \Eloquent {

	protected $table = "cars";
	
	// Add your validation rules here
	public static $rules = [
		'make' => 'required|max:255',
		'model' => 'required|max:255',
		'license_plate_number' => 'required|max:255',
		'color' => 'required|max:255'

	];

	public static $new_rules = [
		'new_make' => 'required|max:255',
		'new_model' => 'required|max:255',
		'new_license_plate_number' => 'required|max:255',
		'new_color' => 'required|max:255'

	];

	// Don't forget to fill this array
	protected $fillable = ['make', 'model', 'license_plate_number', 'color'];

	public function parkinglots()
	{
		return $this->belongsToMany('ParkingLot');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}
}