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
		return View::make('customer.catalogue');
	}

	public function account()
	{
		return View::make('customer.account');
	}
}

