<?php

/* SMTP is using for send mails and 
 * POP3 is using for receive email to our mail box.
 * We can use phpmailer by own server 
 * or We can use Amazon SES, Google mail server etc.
 * 
 * Note : Gmail is using SSL for security. 
 * for this you need to enable "extension=php_openssl.dll" in your php.ini file
 * 
 */
include "classes/class.phpmailer.php"; // include the class name
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "pengxiang00@gmail.com";
$mail->Password = "spacetime0";
$mail->SetFrom("anyemail@gmail.com");
$mail->Subject = "Your Gmail SMTP Mail";
$mail->Body = "<b>Hi, your first SMTP mail via gmail server has been received. Great Job!.. <br/><br/>by <a href='http://asif18.com'>Asif18</a></b>";
$mail->AddAddress("mohamedasif18@gmail.com");
if (!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message has been sent";
}
?>
