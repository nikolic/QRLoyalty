<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;

class QRManager {
	
	public static function generateCode()
	{
		Log::debug('Executing QRManager@generateCode');
		Log::debug('For user with email address ~> ' . Input::get('email'));

		$user = UserManager::getUserBasicByEmail(Input::get('email'));

		if($user == NULL){
			//TODOS create user account first and then send code to him.
			Log::debug('Executing QRManager@generateCode - ERROR -> cannot find user with this email address:', array('email'=> Input::get('email')));
			return FALSE;
		}
		
		$loyaltyCode = QRManager::insertCodeInDB($user->id);

		if($loyaltyCode == NULL){
			return FALSE;
		}

		$fileLocation = QRManager::_generatePath($loyaltyCode->id);

		QrCode::format('png')->size(150)->color(81,175,255)->backgroundColor(51,51,51)->generate($loyaltyCode->secret, $fileLocation);

		QRManager::sendEmailNotificationWithLoyaltyCode($user, $loyaltyCode);

		return TRUE;
	}

	public static function insertCodeInDB($userId)
	{
		Log::debug('Executing QRManager@insertCodeInDB');

		$qrCodeArray = array(
			'company_id' => Auth::id(),
			'user_id' => $userId,
			'secret' => md5(uniqid(rand(), true)),
			'weight' => 1,
			'used' => FALSE,
			'deleted' => FALSE,
			'active' => TRUE
		);

		$loyaltyCode = LoyaltyCode::create($qrCodeArray);

		return ($loyaltyCode != null && $loyaltyCode->id > 0) ? $loyaltyCode : NULL;
	}

	public static function sendEmailNotificationWithLoyaltyCode($user, $loyaltyCode)
	{
		Log::debug('QRManager@sendEmailNotificationWithLoyaltyCode -> Sending email to users with params: ', array('email' => $user->email));
		try {
			$loyaltyCodeImgPath = QRManager::_generatePath($loyaltyCode->id);
			$companyUser = UserManager::getUserBasic(Auth::id());
			$companyName = $companyUser != NULL && $companyUser->company_name != NULL ? $companyUser->company_name . " - " : "";
			$email = new Email;
			$email->to = $user->email;
			//$email->cc = 'nikolic89@hotmail.com';
			$email->subject =  $companyName .'New loyalty code';
			$email->view = "emails.newcode";
			$email->data = array();
			$email->attachFilePath = $loyaltyCodeImgPath;
			$email->attachmentParams = array('as' => 'NewLoyaltyCode.png', 'mime' => 'application/png');

			$mailer = App::make('QRLMailer');
			$result = $mailer->send($email);
			
			if($result)
			{
				Log::debug('Executing QRManager@sendEmailNotificationWithLoyaltyCode -> success' );
				return TRUE;
			}

		} catch(Exception $e){
			Log::error('Executing QRManager@sendEmailNotificationWithLoyaltyCode error', array('context' => $e));
		}
		
		Log::debug('QRManager@sendEmailNotificationWithLoyaltyCode -- error !!!!', array('email' => $user->email, 'loyaltyCode' => $loyaltyCode));

		return FALSE;
	}

	public static function getAllLoyaltyCodesForCompany(){
		$loyaltyCodes = LoyaltyCode::where('company_id', Auth::id())->with('user')->get();

		return $loyaltyCodes;
	}

	public static function _generatePath($codeId){
		$basePath = Config::get('qrloyalty.codes_path');

		return $basePath . $codeId . '.png';
	}
}