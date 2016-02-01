<?php


class ParkingLotUsersTableSeeder extends Seeder {

	public function run()
	{
		$preferred_parking_lot = ParkingLot::all()->random();

		$user = User::firstOrFail();

		
		$preferred_parking_lot_user = new ParkingLotUser();
		$preferred_parking_lot_user->parking_lot_id = $preferred_parking_lot->id;
		$preferred_parking_lot_user->user_id = $user->id;
		$preferred_parking_lot_user->save(); 

		$preferred_parking_lot = ParkingLot::all()->random();

		$preferred_parking_lot_user = new ParkingLotUser();
		$preferred_parking_lot_user->parking_lot_id = $preferred_parking_lot->id;
		$preferred_parking_lot_user->user_id = $user->id;
		$preferred_parking_lot_user->save(); 

		$preferred_parking_lot = ParkingLot::all()->random();

		$preferred_parking_lot_user = new ParkingLotUser();
		$preferred_parking_lot_user->parking_lot_id = $preferred_parking_lot->id;
		$preferred_parking_lot_user->user_id = $user->id;
		$preferred_parking_lot_user->save(); 

		$preferred_parking_lot = ParkingLot::all()->random();

		$preferred_parking_lot_user = new ParkingLotUser();
		$preferred_parking_lot_user->parking_lot_id = $preferred_parking_lot->id;
		$preferred_parking_lot_user->user_id = $user->id;
		$preferred_parking_lot_user->save(); 
		
	}

}