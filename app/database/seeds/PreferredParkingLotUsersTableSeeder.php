<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PreferredParkingLotUsersTableSeeder extends Seeder {

	public function run()
	{
		$preferred_parking_lot = PreferredParkingLot::firstOrFail();

		$user = User::firstOrFail();

		foreach(range(1, 10) as $index)
		{
			$preferred_parking_lot_user = new PreferredParkingLotUser();
			$preferred_parking_lot_user->preferred_parking_lot_id = $preferred_parking_lot->id;
			$preferred_parking_lot_user->user_id = $user->id;
			$preferred_parking_lot_user->save(); 
		}
	}

}