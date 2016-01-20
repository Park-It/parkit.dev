<?php

class Car extends \Eloquent {

	protected $table = "cars";
	
	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
		"make" => "required|max:255",
		"model" => "required|max:255",
		"license_number" => "required|max:10",
		"color" => 'required|max:150'

	];

	// Don't forget to fill this array
	protected $fillable = [];

}