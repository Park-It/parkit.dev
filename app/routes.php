<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showIndex');
Route::get('/lots/json', 'HomeController@showIndexJson');
Route::get('/test/rating/{var?}', 'RatingsController@test');

Route::get('login', 'HomeController@getLogin');
Route::post('login', 'HomeController@postLogin');
Route::get('logout', 'HomeController@getLogout');

Route::resource('users', 'UsersController');

Route::resource('cars', 'CarsController');

Route::resource('ratings', 'RatingsController');

Route::resource('preferred_parking_lots', 'PreferredParkingLotsController');

Route::resource('parking_lots', 'ParkingLotsController');

Route::get('user/cars', 'HomeController@getUserCars');

Route::get('parkinglot/{id?}', 'ParkingLotsController@getParkingLot');

Route::resource('orders', 'OrdersController');