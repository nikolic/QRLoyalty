<?php

class LoginController extends BaseController {

	protected $layout = 'layouts.front';

	public function index()
	{
		return View::make('login.index');
	}

	public function doLogin()
	{
		//TO DO AUTH LOGIC

		return View::make('home.customers');
	}


}
