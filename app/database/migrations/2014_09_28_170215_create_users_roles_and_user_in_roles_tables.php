<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersRolesAndUserInRolesTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('users', function($table)
		{
			$table->engine = 'InnoDB';
			
			$table->increments('id');
			$table->string('full_name', 100)->nullable();
			$table->string('company_name', 100)->nullable();
			$table->string('email', 100)->unique();
			$table->string('password', 64);
			$table->boolean('active');
			$table->string('remember_token', 100);
			$table->timestamps();
		});

		Schema::create('roles', function($table)
		{
			$table->engine = 'InnoDB';
			
			$table->increments('id');
			$table->string('name', 50)->unique();
			$table->string('description', 100)->nullable();
			$table->tinyInteger('weight')->unique();
			$table->boolean('active')->default(true);
			$table->timestamps();
		});

		Schema::create('user_roles', function($table)
		{
			$table->engine = 'InnoDB';
			
			$table->unsignedInteger('user_id')->unsigned();;
			$table->unsignedInteger('role_id')->unsigned();;
			$table->timestamps();
				
			$table->primary(array('user_id', 'role_id'));
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('role_id')->references('id')->on('roles');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
		Schema::drop('roles');
		Schema::drop('user_roles');		
	}

}
