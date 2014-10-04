<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiftsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gifts', function($table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->unsignedInteger('company_id');
			$table->string('name', 255);
			$table->tinyInteger('price')->default(1);
			$table->boolean('deleted')->default(false);
			$table->boolean('active')->default(true);
			$table->timestamps();
			$table->foreign('company_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('gifts');
	}

}
