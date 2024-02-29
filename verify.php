<?php
 
$captcha = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : null;
 
if(!is_null($captcha)){
	$res = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LdXZoUpAAAAAI6FWPFnCdiIYEdmGQjepXDg24fJ&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']));
  print_r($res)
	if($res->success === true){
		//CAPTCHA validado!!!
		echo 'All right =)';
	}
	else{
		echo 'Errore nella convalida del Captcha!';
	}
}
else{
	echo 'Captcha non compilato!';
}