<?php

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';
require '../PHPMailer-master/src/Exception.php';

function sendEmail($email, $name, $title, $emailContent)
{
	//Create a new PHPMailer instance
	$mail = new PHPMailer;
	//Tell PHPMailer to use SMTP
	$mail->isSMTP();
	//Enable SMTP debugging
	// SMTP::DEBUG_OFF = off (for production use)
	// SMTP::DEBUG_CLIENT = client messages
	// SMTP::DEBUG_SERVER = client and server messages
	$mail->SMTPDebug = SMTP::DEBUG_SERVER;
	//Set the hostname of the mail server
	$mail->Host = 'smtp.gmail.com';
	// use
	// $mail->Host = gethostbyname('smtp.gmail.com');
	// if your network does not support SMTP over IPv6
	//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	$mail->Port = 587;
	//Set the encryption mechanism to use - STARTTLS or SMTPS
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;
	//Username to use for SMTP authentication - use full email address for gmail
	// $mail->Username = 'fake.wandshop@gmail.com';
	$mail->Username = 'fakemailpapi@gmail.com';
	//Password to use for SMTP authentication
	$mail->Password = 'fakemailpapi1234';
	//Set who the message is to be sent from
	$mail->setFrom('from@example.com', 'Wandshop');
	//Set an alternative reply-to address
	$mail->addReplyTo('replyto@example.com', 'First Last');
	//Set who the message is to be sent to
	$mail->addAddress("$email", "$name");
	//Set the subject line
	$mail->Subject = $title;
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	$txtHTML= $emailContent;

	$mail->msgHTML($txtHTML);
	//Replace the plain text body with one created manually
	$mail->AltBody = 'This is a plain-text message body';
	//Attach an image file
	//send the message, check for errors
	if (!$mail->send()) {
	    //echo 'Mailer Error: '. $mail->ErrorInfo;
	    return false;
	} else {
	    // echo "Message sent!<br>
	    // <a href='login.php'>Go to Login</a>";
	    return true;
	}

}


/**
* Send Verification mail involving verification link.
*/
function sendVerifyMail($id, $name, $randCode){
	$title = '[OLLIVANDERS] Activate your account!';
	$verifyEmailContent = "
	<p>Click this link to activate your account<br>
	<label>Code: </label>
    <a href='https://apiwandshop.000webhostapp.com/API-IA2/user/activateAccount.php?email=$id&code=$randCode'>randCode</a></p>";
	sendEmail($id, $name, $title, $verifyEmailContent);
}


?>