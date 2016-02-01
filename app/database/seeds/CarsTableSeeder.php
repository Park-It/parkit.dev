<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CarsTableSeeder extends Seeder {

	public function run()
	{

		$user = User::firstOrFail();

	
		$car = new Car();
		$car->make = 'Toyota';
		$car->model = 'Prius';
		$car->license_plate_number = '4AQJ668';
		$car->color = 'Red';
		$car->user_id = $user->id;
		$car->save();

		$car2 = new Car();
		$car2->make = 'Hyundai';
		$car2->model = 'Genesis';
		$car2->license_plate_number = '6GDG486';
		$car2->color = 'Blue';
		$car2->user_id = $user->id;
		$car2->save();

		$car3 = new Car();
		$car3->make = 'BMW';
		$car3->model = 'X6';
		$car3->license_plate_number = 'G742594';
		$car3->color = 'White';
		$car3->user_id = $user->id;
		$car3->save();

		$car4 = new Car();
		$car4->make = 'Kia';
		$car4->model = 'Soul';
		$car4->license_plate_number = '2CJC569';
		$car4->color = 'Black';
		$car4->user_id = $user->id;
		$car4->save();

		$car5 = new Car();
		$car5->make = 'Ferrari';
		$car5->model = 'Testa Rossa';
		$car5->license_plate_number = 'BB1B001';
		$car5->color = 'Gray';
		$car5->user_id = $user->id;
		$car5->save();
		
	}

}