<?php
class Controller_Widget{

public function view()
{
	if( isset( $_GET['id']))
		$id = $_GET['id'];
	else
		header("Location: ?r=site/index");

	if( ! $widget = Model_Widget::findById($id))
		header("Location: ?r=site/index");

	$app = new App();
	$app->widget = $widget;
	$app->render('layout/header');
	$app->render('widget/view');
	$app->render('layout/footer');
}


public function send_email($to, $subject, $body)
{
	$sendgrid = new SendGrid("jmateo","Amanda13");
	$sendgrid->register_autoloader();
	$mail = new SendGrid\Email();
	$mail->
	addTo($to)->
	setFrom('jmate003@odu.edu')->
	setSubject($subject)->
	setText($body)->
	setHtml($body);

	$sendgrid->web->send($mail);

}

public function send_sms($to, $body)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://mateoj.com/twilioclient/twilio.php");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "to=$to&body=$body");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$output = curl_exec($ch);
	curl_close($ch);
	return $output;		
	 	
}
}
?>