<?php

use Illuminate\Support\Facades\Log;

class RoleManager {
	
	public static function getRole($role)
	{
		Log::debug('Executing RoleManager@getRole', array('role' => $role));
		
		if(!Roles::isValidName($role))
		{
			Log::debug('Executing RoleManager@getRole error - role name invalid');
			return false;
		}
		
		try {
				
			$role = Role::where('name', $role)->first();
			return $role;
		} catch(Exception $e){
			Log::error('Executing RoleManager@getRole error', array('context' => $e));
		}
	
		Log::debug('Executing RoleManager@getRole error');
		return false;
	}
}