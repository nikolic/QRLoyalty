<?php

use Illuminate\Support\Facades\Log;

class QRLMailer extends BaseMailer {

	public function send(Email $email)
	{
		Log::debug('Executing QRLMailer@send');
		if(!$this->valid($email))
		{
			Log::debug('Error executing QRLMailer@send. Provided email data is not valid');
			return false;
		}
		
		try 
		{
			$this->sendEmail($email->to, $email->cc, $email->subject, 
				$email->view, $email->data, $email->from, $email->attachFilePath, $email->attachmentParams);
			Log::debug('Executing QRLMailer@send. Email sent succesfully.');
			return true;
		} catch (TetraspectException $e)
		{
			Log::error('Error executing QRLMailer@send', array('context' => $email, 'error' => $e));
		}

		return false;
	} 
	
	private function valid($email)
	{
		if(!isset($email))
		{
			return false;
		}
		if(!isset($email->to))
		{
			return false;
		}
		if(!isset($email->subject) || !isset($email->subject[0]))
		{
			return false;
		}
		
		return true;
	}
}