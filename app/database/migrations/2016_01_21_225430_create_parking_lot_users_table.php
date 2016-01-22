<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateParkingLotUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('parking_lot_users', function(Blueprint $table)
		{
			$table->integer('parking_lot_id')->unsigned();
			$table->foreign('parking_lot_id')->references('id')->on('parking_lots');
			$table->integer('user_id')->unsigned();
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
		Schema::table('parking_lot_users', function($table) {
			$table->dropForeign('parking_lot_users_parking_lot_id_foreign');
			$table->dropForeign('parking_lot_users_user_id_foreign');
		});

		Schema::drop('parking_lot_users');
	}

}
