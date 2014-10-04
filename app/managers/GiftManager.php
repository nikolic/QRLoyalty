<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;

class GiftManager {
	
	public static function insertGift()
	{
		Log::debug('Executing GiftManager@insertGift');

		$giftArray = array(
			'company_id' => Auth::id(),
			'name' => Input::get('name'),
			'price' => Input::get('price'),
			'deleted' => FALSE,
			'active' => TRUE
		);

		$gift = Gift::create($giftArray);

		return ($gift != null && $gift->id > 0) ? $gift : NULL;
	}

	public static function getAllCompanyGifts()
	{
		return Gift::where('company_id', Auth::id())->with('company')->orderBy('created_at', 'desc')->get();	
	}

}