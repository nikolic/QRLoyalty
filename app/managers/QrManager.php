<?php

use Illuminate\Support\Facades\Log;

class QRManager {
	
	public static function generateCode()
	{
		Log::debug('Executing QRManager@generateCode');
		
		$loyaltyCode = QRManager::insertCodeInDB();

		if($loyaltyCode == NULL){
			return FALSE;
		}

		$basePath = Config::get('qrloyalty.codes_path');
		$fileLocation = $basePath . $loyaltyCode->id . '.png';

		QrCode::format('png')->size(150)->color(81,175,255)->backgroundColor(51,51,51)->generate( $loyaltyCode->secret, $fileLocation);

		return TRUE;
	}

	public static function insertCodeInDB()
	{
		Log::debug('Executing QRManager@insertCodeInDB');
		
		//TODO pass real parameters.
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

		return ($loyaltyCode != null && $loyaltyCode->id > 0) ? $loyaltyCode : NULL;
	}
}