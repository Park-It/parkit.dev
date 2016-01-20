<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public static $rules = array(
	    'first_name'      => 'required|max:255',
	    'last_name'       => 'required|max:255',
	    'username'        => 'required|max:255',
	    'email'           => 'required|max:255',
	    'password'        => 'required|max:255'
	);

	public function setPasswordAttribute($value)
	{
    	$this->attributes['password'] = Hash::make($value);
	}


	public function cars()
	{
		return $this->hasMany('Car');
	}

}
