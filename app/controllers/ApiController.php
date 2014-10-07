<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ApiController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function authenticate()
	{
		Log::debug('Executing LoginController@login', array('context' => Input::get('email')));
		
		$email = Input::get('email');
		$password = Input::get('password');
		
		$isValid = FALSE;
		$gifts = NULL;
		if(Auth::attempt(array('email' => $email, 'password' => $password, 'active' => 1)))
		{	
			if(UserManager::isCompany(Auth::id()))
			{
				$isValid = TRUE;
				$gifts = GiftManager::getAllCompanyGifts(Auth::id());
			}
		}

		return Response::json(array('success' => $isValid, 'authenticated' => $isValid,
		 'company_id' => Auth::id(), 'gifts' => $gifts));
	}

	public function gifts()
	{
		$company_id = Input::get('company_id');
		$gifts = GiftManager::getAllCompanyGifts($company_id);

		return Response::json(array('success' => TRUE, 'gifts' => $gifts->toArray()));
	}

	public function validateCode()
	{
		$company_id = Input::get('company_id');
		$secret = Input::get('secret');
		$loyaltyCode = QRManager::validateCode($company_id, $secret);
		$codeExist = $loyaltyCode != NULL;
		return Response::json(array('success' => TRUE,
									'loyaltyCode' => $loyaltyCode,
									'exist' => $codeExist,
									'url' => $codeExist ? URL::to('/codes/' . $loyaltyCode->id . '.png') : NULL
			));
	}

}
