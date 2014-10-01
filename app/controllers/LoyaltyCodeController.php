<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;

class LoyaltyCodeController extends BaseController {

	protected $layout = 'layouts.master';

	public function create()
	{
		$success = QRManager::generateCode();

		return Response::json(array('success' => $success));
	}

}