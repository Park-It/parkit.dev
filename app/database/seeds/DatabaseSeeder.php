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
		DB::table('cars')->delete();
		DB::table('ratings')->delete();
		DB::table('parking_lots')->delete();
		DB::table('preferred_parking_lot_users')->delete();
		DB::table('users')->delete();
		DB::table('preferred_parking_lots')->delete();
		

		$this->call('ParkingLotsTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('CarsTableSeeder');
		$this->call('CarParkingLotsTableSeeder');
		$this->call('RatingsTableSeeder');
		$this->call('PreferredParkingLotsTableSeeder');
		$this->call('PreferredParkingLotUsersTableSeeder');
	}

}
