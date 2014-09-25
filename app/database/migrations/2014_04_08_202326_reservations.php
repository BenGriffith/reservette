<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Reservations extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reservations', function($table)
		{
			$table->increments('id');
			$table->integer('room_id')->unsigned();
			$table->integer('status')->unsigned();
			$table->string('meeting_title', 50);
			$table->string('full_name', 80);
			$table->string('email', 50);
			$table->timestamp('start_at');
			$table->timestamp('end_at');
			$table->text('notes')->nullable();
			$table->timestamps();
			
			$table->foreign('room_id')->references('id')->on('rooms');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reservations');
	}

}
