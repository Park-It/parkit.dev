<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class OrdersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$parking_lot = ParkingLot::firstOrFail();
		$car = Car::firstOrFail();

		$order = new Order();
		$order->parking_lot_id = $parking_lot->id;
		$order->car_id = $car->id;
		$order->stripe_customer_id = $faker->swiftBicNumber;
		$order->save();

		$order2 = new Order();
		$order2->parking_lot_id = $parking_lot->id;
		$order2->car_id = $car->id;
		$order2->stripe_customer_id = $faker->swiftBicNumber;
		$order2->save();

		$order3 = new Order();
		$order3->parking_lot_id = $parking_lot->id;
		$order3->car_id = $car->id;
		$order3->stripe_customer_id = $faker->swiftBicNumber;
		$order3->save();
	}

}