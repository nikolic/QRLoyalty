<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQrcodesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('loyalty_codes', function($table)
		{
			$table->engine = 'InnoDB';
			
			$table->increments('id');
			$table->unsignedInteger('company_id');
			$table->unsignedInteger('user_id');
			$table->string('secret', 255)->unique();
			$table->tinyInteger('weight')->default(1);
			$table->boolean('used')->default(false);
			$table->boolean('deleted')->default(false);
			$table->boolean('active')->default(true);
			$table->timestamps();
			$table->foreign('company_id')->references('id')->on('users');
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('loyalty_codes');
	}

}
