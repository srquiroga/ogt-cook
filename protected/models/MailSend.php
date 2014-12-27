<?php  
yii::import('application.extensions.phpmailer.JPhpMailer'); 
class MailSend{
	
	

	public function sendMain(array $from, array $to, $subject, $message){

		$mail = new JPhpMailer;
		$mail-> isSMTP();
		$mail->Host='localhost';
		$mail->SetFrom($from[0], $from[1]);
		$mail->Subject =$subject;
		$mail->MsgHTML($message);
		$mail->AddAddress($to[0], $to[1]);
		$mail->Send();

	}	
}