<?php

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

function sendMail($email, $user, $act){
	//Create a new PHPMailer instance
	$mail = new PHPMailer;
	//Tell PHPMailer to use SMTP
	$mail->isSMTP();
	//Enable SMTP debugging
	// SMTP::DEBUG_OFF = off (for production use)
	// SMTP::DEBUG_CLIENT = client messages
	// SMTP::DEBUG_SERVER = client and server messages
	$mail->SMTPDebug = SMTP::DEBUG_OFF;
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
	$mail->Username = 'fakemailpapi@gmail.com';
	//Password to use for SMTP authentication
	$mail->Password = 'fakemailpapi1234';
	//Set who the message is to be sent from
	$mail->setFrom('from@example.com', 'First Last');
	//Set an alternative reply-to address
	$mail->addReplyTo('replyto@example.com', 'First Last');
	//Set who the message is to be sent to
	$mail->addAddress($email, $user);
	//Set the subject line
	$mail->Subject = 'PHPMailer GMail SMTP test';
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	$txtHTML='
		<p>
	    	 Hi , <br>This is a message from the PAI class. Activation Code: ' . $act . '
	    </p>';

	$mail->msgHTML($txtHTML);
	//Replace the plain text body with one created manually
	$mail->AltBody = 'This is a plain-text message body';
	//Attach an image file
	//send the message, check for errors
	if (!$mail->send()) {
	    echo 'Mailer Error: '. $mail->ErrorInfo;
	    return false;
	} else {
	    //echo 'Message sent!';
	    
	    header("Location: signedup.php?email=$email&user=$user&act=$act");
	    return true;
	}
}

?>
