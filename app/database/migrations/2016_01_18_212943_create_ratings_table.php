<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRatingsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ratings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('stars');
			$table->text('comment');
			$table->boolean('recommended');
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
		Schema::table('ratings', function($table) {
			$table->dropForeign('ratings_user_id_foreign');
			$table->dropForeign('ratings_parking_lot_id_foreign');
		});

		Schema::drop('ratings');
	}
}