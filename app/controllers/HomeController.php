<?php

use Illuminate\Support\Facades\Log;

class HomeController extends BaseController {

	protected $layout = 'layouts.front';

	public function index()
	{
		//$success = QRManager::insertCodeInDB();

		//$user = User::find(4);
		//Log::debug('codes------', array('tet->',$user->userCodes->toArray()));

		return View::make('home.index');
	}

	public function customers()
	{
		return View::make('home.customers');
	}

	public function companies()
	{
		return View::make('home.companies');
	}

}
