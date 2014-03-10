<?php

class Mailer extends CApplicationComponent
{
   public $backend;
   public $mimeParams;

	public function send($from, $to, $subject, $body)
	{
       $s= "=?utf-8?b?".base64_encode($subject)."?=";
       $headers = "MIME-Version: 1.0\r\n";
       $headers.= "From: $from"."r\n";
       $headers.= "Content-Type: text/html;charset=utf-8\r\n";
       $headers.= "Reply-To: " . Yii::app()->params['adminEmail']. "\r\n";  
       $headers.= "X-Mailer: PHP/" . phpversion();
				
		 mail($to,$subject,$body,$headers,"");
	}
	
	public function sendMIME($from, $to, $subject, $text, $html)
	{
      if ($html > $text)
         $text = $html;
      
      $this->send($from, $to, $subject, $text);
	}
}
