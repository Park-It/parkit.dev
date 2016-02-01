<?php

class ParkingLotUser extends BaseModel {

	// Add your validation rules here
	public static $rules = [
		'parking-lot-id' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['parking_lot_id', 'user_id'];

}