<?php
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.hostinger.in';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'info@holbos.com';                 // SMTP username
$mail->Password = 'B^/^s#X^&N';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('info@holbos.com', 'Holbos');
$mail->addAddress('info@holbos.com', 'Holbos');     // Add a recipient
$mail->addAddress('info@holbos.com');               // Name is optional
$mail->addReplyTo('info@holbos.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'HOLBOS - Email Verification';
$mail->Body    = 'For email verification, Please click the link given below <br>
    <a href="">Confirm Email</a>';
$mail->AltBody = 'Sorry Something Went Wrong! Contact and Report to us your issue!';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}