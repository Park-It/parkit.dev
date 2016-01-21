<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePreferredParkingLotUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('preferred_parking_lot_users', function(Blueprint $table)
		{
			$table->integer('preferred_parking_lot_id')->unsigned();
			$table->foreign('preferred_parking_lot_id')->references('id')->on('preferred_parking_lots');
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
		Schema::table('preferred_parking_lot_users', function($table) {
			$table->dropForeign('preferred_parking_lot_users_preferred_parking_lot_id_foreign');
			$table->dropForeign('preferred_parking_lot_users_user_id_foreign');
		});

		Schema::drop('preferred_parking_lot_users');
	}

}
