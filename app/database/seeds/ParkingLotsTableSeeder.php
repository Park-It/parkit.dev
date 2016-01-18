<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ParkingLotsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			$parking_lot = new ParkingLot();
			$parking_lot->name = $faker->firstName;
			$parking_lot->address = $faker->streetAddress;
			$parking_lot->price = $faker->randomFloat($nbMaxDecimals = 2);
			$parking_lot->max_spots = $faker->randomNumber;
			$parking_lot->save();

			$parking_lot2 = new ParkingLot();
			$parking_lot2->name = $faker->firstName;
			$parking_lot2->address = $faker->streetAddress;
			$parking_lot2->price = $faker->randomFloat($nbMaxDecimals = 2);
			$parking_lot2->max_spots = $faker->randomNumber;
			$parking_lot2->save();

			$parking_lot3 = new ParkingLot();
			$parking_lot3->name = $faker->firstName;
			$parking_lot3->address = $faker->streetAddress;
			$parking_lot3->price = $faker->randomFloat($nbMaxDecimals = 2);
			$parking_lot3->max_spots = $faker->randomNumber;
			$parking_lot3->save();

			$parking_lot4 = new ParkingLot();
			$parking_lot4->name = $faker->firstName;
			$parking_lot4->address = $faker->streetAddress;
			$parking_lot4->price = $faker->randomFloat($nbMaxDecimals = 2);
			$parking_lot4->max_spots = $faker->randomNumber;
			$parking_lot4->save();
		}
	}

}