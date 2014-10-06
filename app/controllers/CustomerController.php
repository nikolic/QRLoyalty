<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends BaseController {

	protected $layout = 'layouts.master';

	public function index()
	{
		$codes = QRManager::getAllLoyaltyCodesForUser();
		$companies = UserManager::getAllCompanies();

		return View::make('customer.index', array('codes' => json_encode($codes->toArray()),
				'companies' =>  json_encode($companies->toArray())
			));
	}

	public function catalogue()
	{
		$codes = QRManager::getAllLoyaltyCodesForUser();
		$gifts = GiftManager::getAllActiveGifts();
		$companies = UserManager::getAllCompanies();

		return View::make('customer.catalogue', array('gifts' => json_encode($gifts->toArray()),
													  'companies' =>  json_encode($companies->toArray()),
													  'codes' => json_encode($codes->toArray())));
	}

	public function account()
	{
		$user = UserManager::getUserBasic(Auth::id());
		return View::make('customer.account', array('user' => $user));
	}

	public function changePassword()
	{
		$success = UserManager::updatePassword(Auth::id());
		return Response::json(array('success' => $success));
	}
}

