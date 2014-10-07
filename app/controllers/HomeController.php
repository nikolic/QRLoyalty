<?php

use Illuminate\Support\Facades\Log;

class HomeController extends BaseController {

	protected $layout = 'layouts.front';

	public function index()
	{
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
