<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('parking_lot_id')->unsigned();
			$table->foreign('parking_lot_id')->references('id')->on('parking_lots');
			$table->integer('car_id')->unsigned();
			$table->foreign('car_id')->references('id')->on('cars');
			$table->string('stripe_customer_id', 255);
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
		Schema::drop('orders');
	}

}
