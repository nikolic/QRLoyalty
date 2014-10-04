<?php

use LaravelBook\Ardent\Ardent;

class Gift extends Ardent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'gifts';
	
	protected $guarded = array('id');
	
	public static $rules = array(
	);
		
	/*
	 * Relationship with Company
	*/
	public function company()
	{
		return $this->belongsTo('User','company_id');
	}

}