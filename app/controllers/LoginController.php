<?php
use Illuminate\Support\Facades\Log;

class LoginController extends BaseController {

	protected $layout = 'layouts.front';

	public function index()
	{
		return View::make('login.index');
	}

	public function login(){
		Log::debug('Executing LoginController@login', array('context' => Input::get('email')));
		
		$email = Input::get('email');
		$password = Input::get('password');
		
		if(Auth::attempt(array('email' => $email, 'password' => $password, 'active' => 1)))
		{
			//TO DO Check companies
			if(UserManager::isCompany(Auth::id()))
			{
				return Redirect::to('/company/home');
			}
	
			Log::debug('Executing LoginController@login - user logged in', array('user' => Auth::user()->email));
			return Redirect::to('/customer/home');
			//return Redirect::route(Routes::PRAKTIK_HOME);
		}
		
		Log::debug('Executing LoginController@login - user credentials are wrong', array('user' => $email));
		return View::make('login.index', array('email' => $email, 'loginFailedMessage' => 'Login falid.'));
	}
	
	public function logout()
	{
		//Log::debug('Executing LoginController@logout', array('user' => Auth::user()->email));
		
		Auth::logout();
		Session::flush();
		Log::debug('Executing LoginController@logout - user logged out');
		return Redirect::to('/');
	}
}
