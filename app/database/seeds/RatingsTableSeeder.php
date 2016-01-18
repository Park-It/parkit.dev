<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RatingsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$parking_lot = ParkingLot::firstOrFail();

		foreach(range(1, 10) as $index)
		{
			$rating = new Rating();
			$rating->stars = $faker->randomDigitNotNull;
			$rating->comment = $faker->realText;
			$rating->recommended = $faker->boolean;
			$rating->parking_lot_id = $parking_lot->id;
			$rating->save();

			$rating2 = new Rating();
			$rating2->stars = $faker->randomDigitNotNull;
			$rating2->comment = $faker->realText;
			$rating2->recommended = $faker->boolean;
			$rating2->parking_lot_id = $parking_lot->id;
			$rating2->save();

			$rating3 = new Rating();
			$rating3->stars = $faker->randomDigitNotNull;
			$rating3->comment = $faker->realText;
			$rating3->recommended = $faker->boolean;
			$rating3->parking_lot_id = $parking_lot->id;
			$rating3->save();

			$rating4 = new Rating();
			$rating4->stars = $faker->randomDigitNotNull;
			$rating4->comment = $faker->realText;
			$rating4->recommended = $faker->boolean;
			$rating4->parking_lot_id = $parking_lot->id;
			$rating4->save();
		}
	}

}