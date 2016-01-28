<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cars', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('make', 255);
			$table->string('model', 255);
			$table->string('license_plate_number', 10);
			$table->string('color', 150);
			$table->integer('user_id')->unsigned()->nullable();
			$table->foreign('user_id')->references('id')->on('users');
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
		Schema::table('cars', function($table) {
			$table->dropForeign('cars_user_id_foreign');
		});

		Schema::drop('cars');
	}

}
