<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarParkingLotsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('car_parking_lots', function(Blueprint $table)
		{
			$table->integer('car_id')->unsigned();
			$table->foreign('car_id')->references('id')->on('cars');
			$table->integer('parking_lot_id')->unsigned();
			$table->foreign('parking_lot_id')->references('id')->on('parking_lots');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('car_parking_lots', function($table) {
			$table->dropForeign('car_parking_lots_car_id_foreign');
			$table->dropForeign('car_parking_lots_parking_lot_id_foreign');
		});

		Schema::drop('car_parking_lots');
	}

}
