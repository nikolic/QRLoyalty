<?php

use Illuminate\Support\Facades\Log;

class QRManager {
	
	public static function generateCode()
	{
		Log::debug('Executing QRManager@generateCode');
		

		return false;
	}

	public static function insertCodeInDB()
	{
		Log::debug('Executing QRManager@insertCodeInDB');
		
		$qrCodeArray = array(
			'company_id' => 1,
			'user_id' => 4,
			'secret' => md5(uniqid(rand(), true)),
			'weight' => 1,
			'used' => FALSE,
			'deleted' => FALSE,
			'active' => TRUE
		);

		$loyaltyCode = LoyaltyCode::create($qrCodeArray);

		return ($loyaltyCode != null && $loyaltyCode->id > 0) ? $loyaltyCode->id : NULL;
	}
}