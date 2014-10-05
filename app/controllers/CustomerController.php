<?php

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
		$gifts = GiftManager::getAllActiveGifts();
		$companies = UserManager::getAllCompanies();

		return View::make('customer.catalogue', array('gifts' => json_encode($gifts->toArray()),
				'companies' =>  json_encode($companies->toArray()))
			);
	}

	public function account()
	{
		return View::make('customer.account');
	}
}

