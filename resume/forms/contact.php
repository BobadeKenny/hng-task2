<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/autoload.php';

$mail = new PHPMailer();
$mail->isSMTP();

$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;

$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

$mail->SMTPAuth = true;

$mail->Username = 'myusername@gmail.com';               //Changed after Heroku deployment
$mail->Password = 'mypassword';                         // For security reasons.cd
$mail->addReplyTo($_POST["email"], $_POST["name"]);

$mail->addAddress('kennygbeminiyi@gmail.com');

$mail->Subject = 'New Message From Portfolio Contact.';

$mail->Body    = $_POST["message"];
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Your message has been sent. Thank you!';
}

?>
