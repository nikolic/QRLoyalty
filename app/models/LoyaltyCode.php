<?php

use LaravelBook\Ardent\Ardent;

class LoyaltyCode extends Ardent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'loyalty_codes';
	
	protected $guarded = array('id');
	
	public static $rules = array(
	);
	
	/*
	 * Relationship with AddressType
	*/
	public function user()
	{
		return $this->belongsTo('User','user_id');
	}
	
	/*
	 * Relationship with Company
	*/
	public function company()
	{
		return $this->belongsTo('User','company_id');
	}

}