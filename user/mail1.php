<?php
session_start();
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
require_once "phpmailer/class.phpmailer.php";

$random_alpha = md5(rand());
$captcha_code = substr($random_alpha, 0, 10);
$url=$captcha_code;
$code=$captcha_code;
$message = $url;
        
// creating the phpmailer object
$mail = new PHPMailer(true);

// telling the class to use SMTP
$mail->IsSMTP();

// enables SMTP debug information (for testing) set 0 turn off debugging mode, 1 to show debug result
$mail->SMTPDebug = 0;

// enable SMTP authentication
$mail->SMTPAuth = true;

// sets the prefix to the server
$mail->SMTPSecure = 'ssl';

// sets GMAIL as the SMTP server
$mail->Host = 'smtp.gmail.com';

// set the SMTP port for the GMAIL server
$mail->Port = 465;

// your gmail address
$mail->Username = 'shahritu2111@gmail.com';

// your password must be enclosed in single quotes
$mail->Password = 'ritu4197@';

// add a subject line
$mail->Subject = ' verification ';

// Sender email address and name
$mail->SetFrom('shahritu2111@gmail.com', 'rutvi');

$email1=$_POST["txtemail"];
// reciever address, person you want to send
$mail->AddAddress($email1);

// if your send to multiple person add this line again
//$mail->AddAddress('tosend@domain.com');

// if you want to send a carbon copy
//$mail->AddCC('tosend@domain.com');


// if you want to send a blind carbon copy
//$mail->AddBCC('tosend@domain.com');

// add message body
$mail->MsgHTML($message);


// add attachment if any
//$mail->AddAttachment('time.png');

try {
    // send mail
	
	
    $mail->Send();
	$con=mysql_connect('rutvi.db.9462939.hostedresource.com','rutvi','Demo9@1212');
		mysql_select_db('rutvi',$con);
	$res=mysql_query("update user_tbl set code='$code' where pk_email_id='$email1'",$con);
	if($res==1)
	{
		$_SESSION["email"]=$email1;
		header("Location:forgotpass1.php");
	}
	else
	{
    $msg = "Mail send unsuccessfully";
	echo $msg;
	}
} catch (phpmailerException $e) {
    $msg = $e->getMessage();
} catch (Exception $e) {
    $msg = $e->getMessage();
}
?>
