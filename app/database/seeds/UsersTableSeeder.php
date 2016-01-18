<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$car = Car::firstOrFail();

		foreach(range(1, 10) as $index)
		{
			$user = new User();
			$user->first_name = $faker->firstName;
			$user->last_name = $faker->lastName;
			$user->username = $faker->word;
			$user->email = $faker->email;
			$user->password = $faker->md5;
			$user->car_id = $car->id;
			$user->save();

			$user2 = new User();
			$user2->first_name = $faker->firstName;
			$user2->last_name = $faker->lastName;
			$user2->username = $faker->word;
			$user2->email = $faker->email;
			$user2->password = $faker->md5;
			$user2->car_id = $car->id;
			$user2->save();

			$user3 = new User();
			$user3->first_name = $faker->firstName;
			$user3->last_name = $faker->lastName;
			$user3->username = $faker->word;
			$user3->email = $faker->email;
			$user3->password = $faker->md5;
			$user3->car_id = $car->id;
			$user3->save();

			$user4 = new User();
			$user4->first_name = $faker->firstName;
			$user4->last_name = $faker->lastName;
			$user4->username = $faker->word;
			$user4->email = $faker->email;
			$user4->password = $faker->md5;
			$user4->car_id = $car->id;
			$user4->save();
		}
	}

}