<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {

	public function run()
	{
		$newRoles = array(
			array(
				'name' => Roles::CUSTOMER,
				'description' => 'Standard customer account',
				'weight' => 0,
				'active' => TRUE,
			),
			array(
				'name' => Roles::COMPANY,
				'description' => 'Standard company account',
				'weight' => 10,
				'active' => TRUE,
			)
		);
		
		foreach($newRoles as $newRole)
		{
			Role::firstOrCreate($newRole);
		}
		
		$newUsers = array(
			array(
				'company_name' => 'Coffee dream',
				'email' => 'nikolic89@gmail.com',
				'password' => 'qwe123',
				'passwordConfirmation' => 'qwe123',
				'active' => TRUE
			),
			array(
				'full_name' => 'Marko Nikolic',
				'email' => 'nikolic89@hotmail.com',
				'password' => 'qwe123',
				'passwordConfirmation' => 'qwe123',
				'active' => TRUE
			),
		);
		
		$companyRole = RoleManager::getRole(Roles::COMPANY);
		$customerRole = RoleManager::getRole(Roles::CUSTOMER);
		
		foreach($newUsers as $newUser)
		{
			$user = User::where('email', $newUser['email'])->first();
			if(!$user)
			{
				$user = User::create($newUser);
			}
			
			$user->roles()->detach();
			if($user->company_name == 'Coffee dream')
			{
				$user->roles()->attach($companyRole->id);
			}
			else if($user->full_name == 'Marko Nikolic')
			{
				$user->roles()->attach($customerRole->id);
			}
			else
			{
				
			}
		}
	}
}