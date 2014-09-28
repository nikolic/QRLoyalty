<?php

class CustomerController extends BaseController {

	protected $layout = 'layouts.master';

	public function index()
	{
		return View::make('customer.index');
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

