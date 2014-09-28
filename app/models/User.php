<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use LaravelBook\Ardent\Ardent;

class User extends Ardent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	
	public static $passwordAttributes  = array('password');
	public $autoHashPasswordAttributes = true;
	public $autoPurgeRedundantAttributes = true;
	
	protected $guarded = array('id', 'remember_token');
	
	function __construct($attributes = array()) {
		parent::__construct($attributes);
	
		$this->purgeFilters[] = function($key) {
			$purge = array('passwordConfirmation');
			return ! in_array($key, $purge);
		};
	}
	
	public static $rules = array(
		'email' => 'required|unique:users',
		'password' => 'required',
		'passwordConfirmation' => 'required|same:password'
	);

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
		
	/*
	 * Relationship with Roles 
	 */
	public function roles()
	{
		return $this->belongsToMany('Role', 'user_roles')->withTimestamps();
	}

}
