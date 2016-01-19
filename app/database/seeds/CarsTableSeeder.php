<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CarsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			$car = new Car();
			$car->make = $faker->lastName;
			$car->model = $faker->lastName;
			$car->license_number = $faker->randomNumber;
			$car->color = $faker->lastName;
			$car->save();

			$car2 = new Car();
			$car2->make = $faker->lastName;
			$car2->model = $faker->lastName;
			$car2->license_number = $faker->randomNumber;
			$car2->color = $faker->lastName;
			$car2->save();

			$car3 = new Car();
			$car3->make = $faker->lastName;
			$car3->model = $faker->lastName;
			$car3->license_number = $faker->randomNumber;
			$car3->color = $faker->lastName;
			$car3->save();

			$car4 = new Car();
			$car4->make = $faker->lastName;
			$car4->model = $faker->lastName;
			$car4->license_number = $faker->randomNumber;
			$car4->color = $faker->lastName;
			$car4->save();
		}
	}

}