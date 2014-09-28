<?php

use LaravelBook\Ardent\Ardent;

class Role extends Ardent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'roles';
	protected $guarded = array('id');
	protected $fillable = ['name', 'weight', 'description'];

	public static $rules = array(
		'name' => 'required|unique:roles',
		'weight' => 'required|numeric'
	);
	
	/*
	 * Relationship with Users
	*/
	public function users()
	{
		return $this->belongsToMany('User', 'user_roles')->withTimestamps();
	}

}
