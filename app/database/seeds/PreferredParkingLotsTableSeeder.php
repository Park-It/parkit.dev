<?php


class PreferredParkingLotsTableSeeder extends Seeder {

	public function run()
	{
		$preferred_parking_lot = new PreferredParkingLot();
		$preferred_parking_lot->preferred_parking_lot = 1;
		$preferred_parking_lot->save();

		$preferred_parking_lot2 = new PreferredParkingLot();
		$preferred_parking_lot2->preferred_parking_lot = 0;
		$preferred_parking_lot2->save();
	}

}