<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Rooms extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rooms', function($table)
		{
			$table->increments('id');
			$table->string('name', 30);
			$table->integer('sq_ft');
			$table->integer('max_capacity');
			$table->boolean('has_AV');
			$table->boolean('has_table');
			$table->boolean('has_projector');
			$table->enum('privacy', array('open', 'half', 'closed'));
			$table->string('floor', 10);
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
		Schema::drop('rooms');
	}

}
