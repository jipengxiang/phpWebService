<?php

require("phpmailer/class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP(); // send via SMTP
IsSMTP(); // send via SMTP
$mail->SMTPAuth = true; // turn on SMTP authentication

$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
$mail->Host = "smtp.gmail.com";
$mail->Port = 587; // or 587

$mail->Username = "pengxina00@gmail.com"; // SMTP username
$mail->Password = "spacetime0"; // SMTP password
$webmaster_email = "username@doamin.com"; //Reply to this email ID
$email = "jipx@sp.edu.sg"; // Recipients email ID
$name = "name"; // Recipient's name
$mail->From = $webmaster_email;
$mail->FromName = "Webmaster";
$mail->AddAddress($email, $name);
$mail->AddReplyTo($webmaster_email, "Webmaster");
$mail->WordWrap = 50; // set word wrap
$mail->AddAttachment("/var/tmp/file.tar.gz"); // attachment
$mail->AddAttachment("/tmp/image.jpg", "new.jpg"); // attachment
$mail->IsHTML(true); // send as HTML
$mail->Subject = "This is the subject";
$mail->Body = "Hi,
    This is the HTML BODY "; //HTML Body
$mail->AltBody = "This is the body when user views in plain text format"; //Text Body
if (!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message has been sent";
}
?>