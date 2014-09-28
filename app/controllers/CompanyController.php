<?php

class CompanyController extends BaseController {

	protected $layout = 'layouts.master';

	public function index()
	{
		return View::make('company.index');
	}

	public function codes()
	{
		return View::make('company.codes');
	}

	public function gifts()
	{
		return View::make('company.gifts');
	}

}
