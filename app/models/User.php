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
	    'email'           => 'required|max:255|email|unique:users,email',
	    'password'        => 'required|max:255'
	);

	public static $first_name_rule = array(
	    'new_first_name'      => 'required|max:255'
	);

	public static $last_name_rule = array(
	    'new_last_name'      => 'required|max:255'
	);

	public static $username_rule = array(
	    'new_username'      => 'required|max:255'
	);

	public static $email_rule = array(
	    'new_email'      => 'required|max:255|email|unique:users,email'
	);

	public static $password_rule = array(
	    'new_password'      => 'required|max:255|confirmed',
	);

	public function setPasswordAttribute($value)
	{
    	$this->attributes['password'] = Hash::make($value);
	}

	public function cars()
	{
		return $this->hasMany('Car');
	}

	public function ratings()
	{
		return $this->hasMany('Rating');
	}

}
