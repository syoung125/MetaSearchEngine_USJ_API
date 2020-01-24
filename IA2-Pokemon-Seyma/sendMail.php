<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';


//i know that these two functions are almost the same :(

function sendRegMail($email, $user, $act){
	$mail = new PHPMailer;

	$mail->isSMTP();

	$mail->SMTPDebug = SMTP::DEBUG_OFF;

	$mail->Host = 'smtp.gmail.com';

	$mail->Port = 587;

	$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

	$mail->SMTPAuth = true;

	$mail->Username = 'fakemailpapi@gmail.com';

	$mail->Password = 'fakemailpapi1234';

	$mail->setFrom('from@example.com', 'Pokemon Club');

	$mail->addReplyTo('replyto@example.com', 'First Last');

	$mail->addAddress($email, $user);

	$mail->Subject = 'Activation Code';

	$txtHTML='
		<p>
	    	 Hi, <br>Thank you for registering to Pokemon Club. Activation Code: ' . $act . '
	    	<br> Or you can just click this link: https://apispamuk.000webhostapp.com/IA2/mail_activate.php?user=' . $user .
	    '</p>';

	$mail->msgHTML($txtHTML);

	$mail->AltBody = 'This is a plain-text message body';

	if (!$mail->send()) {
	    echo 'Mailer Error: '. $mail->ErrorInfo;
	    return false;
	} else {
	    ob_end_clean();
	    header("Location: signed_up.php?email=$email&user=$user&act=$act");
	    return true;
	}
	
	ob_end_flush();
}

function sendResetMail($email){
	$mail = new PHPMailer;

	$mail->isSMTP();

	$mail->SMTPDebug = SMTP::DEBUG_OFF;

	$mail->Host = 'smtp.gmail.com';

	$mail->Port = 587;

	$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

	$mail->SMTPAuth = true;

	$mail->Username = 'fakemailpapi@gmail.com';

	$mail->Password = 'fakemailpapi1234';

	$mail->setFrom('from@example.com', 'Pokemon Club');

	$mail->addReplyTo('replyto@example.com', 'First Last');

	$mail->addAddress($email, $email);

	$mail->Subject = 'Reset password';

	$txtHTML='
		<p>
	    	 Hi, <br>To reset your password please click this link: https://apispamuk.000webhostapp.com/IA2/new_pass.php?email=' . $email .
	    '</p>';

	$mail->msgHTML($txtHTML);

	$mail->AltBody = 'This is a plain-text message body';

	if (!$mail->send()) {
	    echo 'Mailer Error: '. $mail->ErrorInfo;
	    return false;
	} else {
	    echo "Please check your e-mail for instructions to reset your password!";
	    return true;
	}
}

?>
