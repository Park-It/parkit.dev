<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PreferredParkingLotsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			$preferred_parking_lot = new PreferredParkingLot();
			$preferred_parking_lot->name = $faker->firstName;
			$preferred_parking_lot->address = $faker->streetAddress;
			$preferred_parking_lot->price = $faker->randomFloat($nbMaxDecimals = 2);
			$preferred_parking_lot->max_spots = $faker->randomNumber;
			$preferred_parking_lot->save();

			$preferred_parking_lot2 = new PreferredParkingLot();
			$preferred_parking_lot2->name = $faker->firstName;
			$preferred_parking_lot2->address = $faker->streetAddress;
			$preferred_parking_lot2->price = $faker->randomFloat($nbMaxDecimals = 2);
			$preferred_parking_lot2->max_spots = $faker->randomNumber;
			$preferred_parking_lot2->save();

			$preferred_parking_lot3 = new PreferredParkingLot();
			$preferred_parking_lot3->name = $faker->firstName;
			$preferred_parking_lot3->address = $faker->streetAddress;
			$preferred_parking_lot3->price = $faker->randomFloat($nbMaxDecimals = 2);
			$preferred_parking_lot3->max_spots = $faker->randomNumber;
			$preferred_parking_lot3->save();

			$preferred_parking_lot4 = new PreferredParkingLot();
			$preferred_parking_lot4->name = $faker->firstName;
			$preferred_parking_lot4->address = $faker->streetAddress;
			$preferred_parking_lot4->price = $faker->randomFloat($nbMaxDecimals = 2);
			$preferred_parking_lot4->max_spots = $faker->randomNumber;
			$preferred_parking_lot4->save();
		}
	}

}