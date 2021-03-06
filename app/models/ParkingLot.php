<?php

class ParkingLot extends BaseModel {

	// Add your validation rules here
	public static $rules = [
		'name' => 'required|max:255',
		'address' => 'required|max:255',
		'price' => 'required|max:255',
		'max_spots' => 'required|max:255'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	public function cars()
	{
		return $this->belongsToMany('Car');
	}

}