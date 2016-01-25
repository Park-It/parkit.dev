<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();


		$user = new User();
		// Make sure you have these defined in you .env.local.php
		$user->first_name = $_ENV['USER_FIRST'];
		$user->last_name = $_ENV['USER_LAST'];
		$user->username = $_ENV['USER_USERNAME'];
		$user->email = $_ENV['USER_EMAIL'];
		$user->password = $_ENV['USER_PASS'];
		$user->save();
		

		foreach(range(1, 10) as $index)
		{
			$user = new User();
			$user->first_name = $faker->firstName;
			$user->last_name = $faker->lastName;
			$user->username = $faker->userName;
			$user->email = $faker->email;
			$user->password = $faker->md5;
			$user->save();

			$user2 = new User();
			$user2->first_name = $faker->firstName;
			$user2->last_name = $faker->lastName;
			$user2->username = $faker->userName;
			$user2->email = $faker->email;
			$user2->password = $faker->md5;
			$user2->save();

			$user3 = new User();
			$user3->first_name = $faker->firstName;
			$user3->last_name = $faker->lastName;
			$user3->username = $faker->userName;
			$user3->email = $faker->email;
			$user3->password = $faker->md5;
			$user3->save();

			$user4 = new User();
			$user4->first_name = $faker->firstName;
			$user4->last_name = $faker->lastName;
			$user4->username = $faker->userName;
			$user4->email = $faker->email;
			$user4->password = $faker->md5;
			$user4->save();
		}
	}

}