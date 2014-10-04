<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;

class GiftController extends BaseController {

	protected $layout = 'layouts.master';

	public function create()
	{
		$gift = GiftManager::insertGift();
		$gifts = GiftManager::getAllCompanyGifts();
		$success = $gift != NULL && $gift->id > 0;

		return Response::json(array('success' => $success, 'gifts' => $gifts));
	}

}