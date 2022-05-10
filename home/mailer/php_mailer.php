

<?php
// session_start();
/**
 * This example shows making an SMTP connection without using authentication.
 */
// path to phpmailer classes
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
// $mail->SMTPDebug = SMTP::DEBUG_SERVER; //hide things
//Set the hostname of the mail server
$mail->Host = 'mail.interviewstories.org';
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 25;
//We don't need to set this as it's the default value
//$mail->SMTPAuth = false;
//Set who the message is to be sent from
if(!empty($_SESSION['from'])){
    
$mail->setFrom($_SESSION['from']);//'admin@interviewstories.org', 'First Last'

//Set an alternative reply-to address
$mail->addReplyTo($_SESSION['from']);//
}

if(!empty($_SESSION['to'])){
    
//Set who the message is to be sent to
$mail->addAddress($_SESSION['to']);//'ifeoseni@gmail.com', 'John Doe'
//Set the subject line
}
if(!empty($_SESSION['message'])){
$mail->Subject = $_SESSION['message'];//'PHPMailer SMTP without auth test';
}
if(!empty($_SESSION['body'])){
$mail->Body =$_SESSION['body'];
}

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//send the message, check for errors
// if (!$mail->send()) {
//     echo '<p>Mailer Error: '. $mail->ErrorInfo.'</p>';
// } else {
//     echo 'Message sent!';
// }


// session_unset();

// // destroy the session
// session_destroy(); 