<?php


class ParkingLotUsersTableSeeder extends Seeder {

	public function run()
	{
		$preferred_parking_lot = ParkingLot::all()->random();

		$user = User::firstOrFail();

		foreach(range(1, 10) as $index)
		{
			$preferred_parking_lot_user = new ParkingLotUser();
			$preferred_parking_lot_user->parking_lot_id = $preferred_parking_lot->id;
			$preferred_parking_lot_user->user_id = $user->id;
			$preferred_parking_lot_user->save(); 
		}
	}

}