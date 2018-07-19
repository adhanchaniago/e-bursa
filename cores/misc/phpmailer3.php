<?php  

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'cores/vendors/PHPMailer/src/Exception.php';
	require 'cores/vendors/PHPMailer/src/PHPMailer.php';
	require 'cores/vendors/PHPMailer/src/SMTP.php';

	$mail = new PHPMailer(true);

	//$mail->SMTPDebug = 2;                                // Enable verbose debug output
    $mail->isSMTP();										// Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  						// Specify main and backup SMTP servers
    $mail->SMTPAuth = true;									// Enable SMTP authentication
    $mail->Username = 'ebursa.pariaman@gmail.com';			// SMTP username
    $mail->Password = 'ebursa2018';							// SMTP password
    $mail->SMTPSecure = 'tls';								// Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;										// TCP port to connect to

    $mail->setFrom('ebursa.pariaman@gmail.com', 'E-Bursa NoReply');

?>