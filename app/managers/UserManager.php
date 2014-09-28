<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Input;

class UserManager {
	
	public static function insertUser($active = FALSE)
	{
		Log::debug('Executing UserManager@insertUser');
		try {

			$user = array(
				'first_name' => Input::get('firstName'),
				'last_name' => Input::get('lastName'),
				'position' => Input::get('position', NULL),
				'phone' => Input::get('phone'),
				'email' => Input::get('email'),
				'password' => Input::get('password'),
				'passwordConfirmation' => Input::get('passwordConfirmation'),
				'active' => $active
			);
			
			$user = User::create($user);
			
			Log::debug('Executing UserManager@insertUser done.');
			return $user;
		
		} catch(TetraspectException $e){
			Log::error('Executing UserManager@insertUser error', array('context' => $e));
		}
		
		Log::debug('Executing UserManager@insertUser error');
		return false;
	}
	
	public static function getUserBasic($id)
	{
		Log::debug('Executing UserManager@getUserBasic', array('id' => $id));
		if(!isset($id))
		{
			return NULL;
		}
	
		try {
			$user = User::find($id);
	
			Log::debug('Executing UserManager@getUserBasic success');
			return $user;
		} catch(TetraspectException $e){
			Log::error('Executing UserManager@getUserBasic error', array('context' => $e));
			return NULL;
		}
	
		Log::debug('Executing UserManager@getUserBasic error');
		return NULL;
	}
	
	public static function getUserCompany($id)
	{
		Log::debug('Executing UserManager@getUserCompany', array('id' => $id));
		if(!isset($id))
		{
			return NULL;
		}
	
		try {
			$userCompany = User::find($id)->companies->first();
	
			Log::debug('Executing UserManager@getUserCompany success');
			return $userCompany;
		} catch(TetraspectException $e){
			Log::error('Executing UserManager@getUserCompany error', array('context' => $e));
			return NULL;
		}
	
		Log::debug('Executing UserManager@getUserCompany error');
		return NULL;
	}
	
	public static function getUserBasicByEmail($email)
	{
		Log::debug('Executing UserManager@getUserBasicByEmail', array('email' => $email));
		if(!isset($email))
		{
			return NULL;
		}
		
		try {
			$user = User::where('email', $email)->first();
	
			Log::debug('Executing UserManager@getUserBasicByEmail success');
			return $user;
		} catch(TetraspectException $e){
			Log::error('Executing UserManager@getUserBasicByEmail error', array('context' => $e));
			return NULL;
		}

		Log::debug('Executing UserManager@getUserBasicByEmail error');
		return NULL;
	}
	
	public static function assignRoles($userId, $roles)
	{
		Log::debug('Executing UserManager@assignRoles', array('userId' => $userId, 'roles' => $roles));
		if(!isset($roles) || !is_array($roles))
		{
			return false;
		}
		
		foreach($roles as $role)
		{
			if(!self::assignRole($userId, $role))
			{
				return false;
			}
		}
		
		Log::debug('Executing UserManager@assignRoles success - roles assigned');
		return true;
	}
	
	public static function assignRole($userId, $role)
	{
		Log::debug('Executing UserManager@assignRole', array('role' => $role));
		
		if(!isset($userId) || !isset($role))
		{
			return false;
		}
		
		$role = RoleManager::getRole($role);
		if(!$role)
		{
			Log::debug('Executing UserManager@assignRole error - role invalid');
			return false;
		}
		
		$hasRoleAlready = self::isUserInRole($userId, $role->name);
		if(isset($hasRoleAlready) && !$hasRoleAlready)
		{
			try {
				$user = User::find($userId);
				$user->roles()->attach($role->id);
				
				Log::debug('Executing UserManager@assignRole success');
				return true;
			} catch(TetraspectException $e){
				Log::error('Executing UserManager@assignRole error', array('context' => $e));
				return false;
			}
		}
		
		Log::debug('Executing UserManager@assignRole error');
		return false;
	}
	
	public static function getTetriarchUser($companyId)
	{
		Log::debug('Executing UserManager@getTetriarchUser', array('companyId' => $companyId));
		if(!isset($companyId))
		{
			return NULL;
		}
	
		try {
			$company = Company::find($companyId);
			if($company)
			{
				$user = User::whereHas('roles', function($q)
				{
					$q->where('name', Roles::TETRIARCH);
						
				})
				->whereHas('companies', function($q) use ($company)
				{
					$q->where('id', $company->id);
						
				})->first();
				
				return $user;
			}
		} catch(TetraspectException $e){
			Log::error('Executing UserManager@getTetriarchUser error', array('context' => $e));
			return NULL;
		}
	
		Log::debug('Executing UserManager@getTetriarchUser error');
		return NULL;
	}
	
	public static function isUserInRole($userId, $role)
	{
		Log::debug('Executing UserManager@isUserInRole', array('userId' => $userId, 'role' => $role));
		if(!isset($userId) || !isset($role))
		{
			return NULL;
		}
		
		try {
			$user = User::whereHas('roles', function($q) use ($role)
			{
				$q->where('name', $role);
			
			})->find($userId);
			
			if(isset($user))
			{
				return true;
			} else {
				return false;
			}
		} catch(TetraspectException $e){
			Log::error('Executing UserManager@isUserInRole error', array('context' => $e));
			return NULL;
		}
	}
	
	public static function hasAnyRole($userId, $roles)
	{
		Log::debug('Executing UserManager@hasAnyRole', array('userId' => $userId, 'roles' => $roles));
		if(!isset($userId) || !isset($roles))
		{
			return NULL;
		}
	
		try {
			$user = User::whereHas('roles', function($q) use ($roles)
			{
				$q->whereIn('name', $roles);
					
			})->find($userId);
				
			if(isset($user))
			{
				return true;
			} else {
				return false;
			}
		} catch(TetraspectException $e){
			Log::error('Executing UserManager@hasAnyRole error', array('context' => $e));
			return NULL;
		}
	}
	
	public static function isAdmin($userId)
	{
		Log::debug('Executing UserManager@isAdmin', array('userId' => $userId));
		if(!isset($userId))
		{
			return NULL;
		}
	
		try {
			$user = User::whereHas('roles', function($q)
			{
				$q->where('admin', TRUE);
					
			})->find($userId);
				
			if(isset($user))
			{
				return true;
			} else {
				return false;
			}
		} catch(TetraspectException $e){
			Log::error('Executing UserManager@isAdmin error', array('context' => $e));
			return NULL;
		}
	}
	
	public static function isUser($userId)
	{
		Log::debug('Executing UserManager@isAdmin', array('userId' => $userId));
		if(!isset($userId))
		{
			return NULL;
		}
	
		try {
			$user = User::whereHas('roles', function($q)
			{
				$q->where('admin', FALSE);
					
			})->find($userId);
	
			if(isset($user))
			{
				return true;
			} else {
				return false;
			}
		} catch(TetraspectException $e){
			Log::error('Executing UserManager@isAdmin error', array('context' => $e));
			return NULL;
		}
	}
	
	public static function isMemberOfCompany($companyId, $userId)
	{
		Log::debug('Executing UserManager@isMemberOfCompany', array('companyId' => $companyId, 'userId' => $userId));
		if(!isset($companyId) || !isset($userId))
		{
			return NULL;
		}
	
		try {
			$user = User::whereHas('companies', function($q) use($companyId)
			{
				$q->where('id', $companyId);
					
			})->find($userId);
	
			if(isset($user))
			{
				return true;
			} else {
				return false;
			}
		} catch(TetraspectException $e){
			Log::error('Executing UserManager@isMemberOfCompany error', array('context' => $e));
			return NULL;
		}
	}
	
	public static function getUsersCount($active = NULL)
	{
		Log::debug('Executing UserManager@getAllUsersCount');
	
		try {
			if(isset($active))
			{
				return User::where('active', $active)->count();
			}
			else 
			{
				return User::count();
			}
	
		} catch(TetraspectException $e){
			Log::error('Executing UserManager@getAllUsersCount error', array('context' => $e));
		}
	
		Log::debug('Executing UserManager@getAllUsersCount error');
		return false;
	}
	
	public static function activateUser($id)
	{
		Log::debug('Executing UserManager@activateUser', array('id' => $id));
		if(!isset($id))
		{
			return false;
		}
	
		try {
			$user = User::find($id);
			if($user != null)
			{
				$user->active = true;
				if($user->forceSave())
				{
					Log::debug('Executing UserManager@activateUser success');
					return true;
				}
			}
		} catch(TetraspectException $e){
			Log::error('Executing UserManager@activateUser error', array('context' => $e));
			return false;
		}
	
		Log::debug('Executing UserManager@activateUser error');
		return false;
	}
	
	public static function updatePassword($id)
	{
		Log::debug('Executing UserManager@updatePassword', array('id' => $id));
		if(!isset($id))
		{
			return false;
		}
	
		try {
			$user = User::find($id);
			$user->password = Input::get('password');
			$user->passwordConfirmation = Input::get('passwordConfirmation');
			
			if($user->updateUniques())
			{
				return true;
			}
			else 
			{
				return $user->errors();	
			}
		} catch(TetraspectException $e){
			Log::error('Executing UserManager@getUserBasic error', array('context' => $e));
			return false;
		}
	
		Log::debug('Executing UserManager@getUserBasic error');
		return false;
	}
}