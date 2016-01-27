<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('car_parking_lots')->delete();
		DB::table('orders')->delete();
		DB::table('cars')->delete();
		DB::table('ratings')->delete();
		DB::table('parking_lot_users')->delete();
		DB::table('parking_lots')->delete();
		DB::table('users')->delete();
		

		$this->call('ParkingLotsTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('CarsTableSeeder');
		$this->call('CarParkingLotsTableSeeder');
		$this->call('RatingsTableSeeder');
		$this->call('ParkingLotUsersTableSeeder');
		$this->call('OrdersTableSeeder');
	}

}
