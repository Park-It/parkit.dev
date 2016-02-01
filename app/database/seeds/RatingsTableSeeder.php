<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RatingsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$parking_lot = ParkingLot::all()->random();

		$user = User::firstOrFail();

		foreach(range(1, 10) as $index)
		{
			$rating = new Rating();
			$rating->stars = $faker->numberBetween($min = 1, $max = 5);
			$rating->comment = 'Great Parking Lot';
			$rating->recommended = $faker->boolean;
			$rating->parking_lot_id = $parking_lot->id;
			$rating->user_id = $user->id;
			$rating->save();

			$parking_lot = ParkingLot::all()->random();

			$rating2 = new Rating();
			$rating2->stars = $faker->numberBetween($min = 1, $max = 5);
			$rating2->comment = 'Excellent Service';
			$rating2->recommended = $faker->boolean;
			$rating2->parking_lot_id = $parking_lot->id;
			$rating2->user_id = $user->id;
			$rating2->save();

			$parking_lot = ParkingLot::all()->random();

			$rating3 = new Rating();
			$rating3->stars = $faker->numberBetween($min = 1, $max = 5);
			$rating3->comment = 'Average Parking Lot';
			$rating3->recommended = $faker->boolean;
			$rating3->parking_lot_id = $parking_lot->id;
			$rating3->user_id = $user->id;
			$rating3->save();

			$parking_lot = ParkingLot::all()->random();

			$rating4 = new Rating();
			$rating4->stars = $faker->numberBetween($min = 1, $max = 5);
			$rating4->comment = 'Bad Customer Service';
			$rating4->recommended = $faker->boolean;
			$rating4->parking_lot_id = $parking_lot->id;
			$rating4->user_id = $user->id;
			$rating4->save();
		}
	}

}