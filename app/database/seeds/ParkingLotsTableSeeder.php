<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ParkingLotsTableSeeder extends Seeder {

	public function run()
	{
		$parking_lot = new ParkingLot();
		$parking_lot->name = 'Alamo Parking - World Trade Center';
		$parking_lot->address = '510 East Travis Street';
		$parking_lot->price = '10.00';
		$parking_lot->max_spots = '500';
		$parking_lot->lat = '29.4275618';
		$parking_lot->lng = '-98.4873184';
		$parking_lot->save();

		$parking_lot2 = new ParkingLot();
		$parking_lot2->name = 'Wyndham Indoor Parking';
		$parking_lot2->address = '130 E Pecan St';
		$parking_lot2->price = '10.00';
		$parking_lot2->max_spots = '200';
		$parking_lot2->lat = '29.4286749';
		$parking_lot2->lng = '-98.4944865';
		$parking_lot2->save();

		$parking_lot3 = new ParkingLot();
		$parking_lot3->name = 'LAZ Parking';
		$parking_lot3->address = '122 N Main Ave';
		$parking_lot3->price = '9.00';
		$parking_lot3->max_spots = '400';
		$parking_lot3->lat = '29.4257201';
		$parking_lot3->lng = '-98.4935338';
		$parking_lot3->save();

		$parking_lot4 = new ParkingLot();
		$parking_lot4->name = 'Sheraton Hotel Parking';
		$parking_lot4->address = '312 N St Mary\'s St';
		$parking_lot4->price = '16.00';
		$parking_lot4->max_spots = '200';
		$parking_lot4->lat = '29.426621';
		$parking_lot4->lng = '-98.4935165';
		$parking_lot4->save();

		$parking_lot5 = new ParkingLot();
		$parking_lot5->name = 'Central Hyatt Regency Parking';
		$parking_lot5->address = '186 Losoya St';
		$parking_lot5->price = '15.00';
		$parking_lot5->max_spots = '300';
		$parking_lot5->lat = '29.4252327';
		$parking_lot5->lng = '-98.4900738';
		$parking_lot5->save();
		
		$parking_lot6 = new ParkingLot();
		$parking_lot6->name = 'Hospitality Parking';
		$parking_lot6->address = '282 Jefferson';
		$parking_lot6->price = '10.00';
		$parking_lot6->max_spots = '1000';
		$parking_lot6->lat = '29.4285103';
		$parking_lot6->lng = '-98.4907123';
		$parking_lot6->save();

		$parking_lot7 = new ParkingLot();
		$parking_lot7->name = 'Central Parking - River Center';
		$parking_lot7->address = '246 E Commerce St';
		$parking_lot7->price = '12.00';
		$parking_lot7->max_spots = '600';
		$parking_lot7->lat = '29.4240215';
		$parking_lot7->lng = '-98.4929254';
		$parking_lot7->save();

		$parking_lot8 = new ParkingLot();
		$parking_lot8->name = 'Travis Park United Methodist Church Parking';
		$parking_lot8->address = '230 E. Travis Street';
		$parking_lot8->price = '10.00';
		$parking_lot8->max_spots = '450';
		$parking_lot8->lat = '29.4272563';
		$parking_lot8->lng = '-98.4922955';
		$parking_lot8->save();

		$parking_lot9 = new ParkingLot();
		$parking_lot9->name = 'SP Plus Parking System';
		$parking_lot9->address = '256 Soledad St';
		$parking_lot9->price = '10.00';
		$parking_lot9->max_spots = '500';
		$parking_lot9->lat = '29.4270331';
		$parking_lot9->lng = '-98.495416';
		$parking_lot9->save();

		$parking_lot10 = new ParkingLot();
		$parking_lot10->name = 'Broadway Parking';
		$parking_lot10->address = '358 Broadway St';
		$parking_lot10->price = '5.00';
		$parking_lot10->max_spots = '200';
		$parking_lot10->lat = '29.4293689';
		$parking_lot10->lng = '-98.4885811';
		$parking_lot10->save();
	}

}