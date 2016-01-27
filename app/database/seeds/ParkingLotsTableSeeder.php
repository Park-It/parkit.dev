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

		$parking_lot11 = new ParkingLot();
		$parking_lot11->name = 'SP PLUS Rosa Verde Towers';
		$parking_lot11->address = '343 W Houston St';
		$parking_lot11->price = '4.00';
		$parking_lot11->max_spots = '300';
		$parking_lot11->lat = '29.4267337';
		$parking_lot11->lng = '-98.4996196';
		$parking_lot11->save();

		$parking_lot12 = new ParkingLot();
		$parking_lot12->name = 'Hospiality Parking Inc';
		$parking_lot12->address = '570 4th Street';
		$parking_lot12->price = '5.00';
		$parking_lot12->max_spots = '400';
		$parking_lot12->lat = '29.4274679';
		$parking_lot12->lng = '-98.4857206';
		$parking_lot12->save();

		$parking_lot13 = new ParkingLot();
		$parking_lot13->name = 'City of San Antonio Central Library Garage';
		$parking_lot13->address = '600 Soledad St';
		$parking_lot13->price = '5.00';
		$parking_lot13->max_spots = '600';
		$parking_lot13->lat = '29.4324141';
		$parking_lot13->lng = '-98.4950192';
		$parking_lot13->save();

		$parking_lot14 = new ParkingLot();
		$parking_lot14->name = 'Parking Plan Inc.';
		$parking_lot14->address = '612 Augusta St';
		$parking_lot14->price = '1.00';
		$parking_lot14->max_spots = '36';
		$parking_lot14->lat = '29.4334631';
		$parking_lot14->lng = '-98.4917847';
		$parking_lot14->save();

		$parking_lot15 = new ParkingLot();
		$parking_lot15->name = 'LAZ Parking';
		$parking_lot15->address = '416 Dwyer Ave';
		$parking_lot15->price = '8.00';
		$parking_lot15->max_spots = '300';
		$parking_lot15->lat = '29.418939';
		$parking_lot15->lng = '-98.4960277';
		$parking_lot15->save();

		$parking_lot16 = new ParkingLot();
		$parking_lot16->name = 'City of San Antonio Market Square Lot';
		$parking_lot16->address = '612 W Commerce St';
		$parking_lot16->price = '10.00';
		$parking_lot16->max_spots = '250';
		$parking_lot16->lat = '29.4252007';
		$parking_lot16->lng = '-98.5028302';
		$parking_lot16->save();

		$parking_lot17 = new ParkingLot();
		$parking_lot17->name = 'CENTRAL Parking System';
		$parking_lot17->address = '247 W Nueva St';
		$parking_lot17->price = '14.00';
		$parking_lot17->max_spots = '1000';
		$parking_lot17->lat = '29.4229333';
		$parking_lot17->lng = '-98.4994784';
		$parking_lot17->save();

		$parking_lot18 = new ParkingLot();
		$parking_lot18->name = 'Tower of the America\'s';
		$parking_lot18->address = '500 S Bowie St';
		$parking_lot18->price = '11.00';
		$parking_lot18->max_spots = '100';
		$parking_lot18->lat = '29.4270191';
		$parking_lot18->lng = '-98.4855493';
		$parking_lot18->save();

		$parking_lot19 = new ParkingLot();
		$parking_lot19->name = 'ENTER Park Inc.';
		$parking_lot19->address = '583 S St Mary\'s St';
		$parking_lot19->price = '5.00';
		$parking_lot19->max_spots = '42';
		$parking_lot19->lat = '29.4195354';
		$parking_lot19->lng = '-98.4931023';
		$parking_lot19->save();

		$parking_lot20 = new ParkingLot();
		$parking_lot20->name = 'PROPARK HYATT';
		$parking_lot20->address = '848 E Market St';
		$parking_lot20->price = '20.00';
		$parking_lot20->max_spots = '350';
		$parking_lot20->lat = '29.4221187';
		$parking_lot20->lng = '-98.4862015';
		$parking_lot20->save();
	}

}