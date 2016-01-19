<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CarParkingLotsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$car = Car::firstOrFail();

		$parking_lot = ParkingLot::firstOrFail();

		foreach(range(1, 10) as $index)
		{
			$car_parking_lot = new CarParkingLot();
			$car_parking_lot->car_id = $car->id;
			$car_parking_lot->parking_lot_id = $parking_lot->id;
			$car_parking_lot->save();

			$car_parking_lot2 = new CarParkingLot();
			$car_parking_lot2->car_id = $car->id;
			$car_parking_lot2->parking_lot_id = $parking_lot->id;
			$car_parking_lot2->save();

			$car_parking_lot3 = new CarParkingLot();
			$car_parking_lot3->car_id = $car->id;
			$car_parking_lot3->parking_lot_id = $parking_lot->id;
			$car_parking_lot3->save();

			$car_parking_lot4 = new CarParkingLot();
			$car_parking_lot4->car_id = $car->id;
			$car_parking_lot4->parking_lot_id = $parking_lot->id;
			$car_parking_lot4->save();
		}
	}

}