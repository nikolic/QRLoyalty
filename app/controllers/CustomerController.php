<?php

class CustomerController extends BaseController {

	protected $layout = 'layouts.master';

	public function index()
	{
		return View::make('customer.index');
	}
}

