<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;

class CompanyController extends BaseController {

	protected $layout = 'layouts.master';

	public function index()
	{
		return View::make('company.index');
	}

	public function codes()
	{
		$codes = QRManager::getAllLoyaltyCodesForCompany();

		return View::make('company.codes', array('codes' => json_encode($codes->toArray())));
	}

	public function gifts()
	{
		return View::make('company.gifts');
	}

}
