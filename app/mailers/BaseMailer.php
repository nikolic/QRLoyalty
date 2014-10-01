<?php

use Illuminate\Support\Facades\Mail;

class BaseMailer {

	public function sendEmail($to, $cc, $subject, $view, $data = [], $from = '', $attachFilePath = '', $attachmentParams = array() ){
		Mail::send($view, $data, function($message) use($to, $cc, $subject, $from, $attachFilePath, $attachmentParams){
			$message->to($to);
			$message->subject($subject);
			if(isset($cc))
			{
				$message->cc($cc);
			}
			if(isset($from) && $from != '')
			{
				$message->from($from);
			}
			if(isset($attachFilePath) && $attachFilePath != '')
			{
				$message->attach($attachFilePath, $attachmentParams);
			}	
		});
	}
}