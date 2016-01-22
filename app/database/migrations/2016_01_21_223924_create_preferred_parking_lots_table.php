<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePreferredParkingLotsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('preferred_parking_lots', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 255);
			$table->string('address', 255);
			$table->decimal('price', 8, 2);
			$table->integer('max_spots');
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
		Schema::drop('preferred_parking_lots');
	}

}
