<!--
http://www.tutorialspoint.com/php/php_sending_emails.htm
-->
<!DOCTYPE html>
<html>
<head>
<title>Sending email using PHP</title>
</head>
<body>
<?php
// validation expected data exists   
 if(!isset($_POST['first_name']) ||!isset($_POST['last_name']) ||        !isset($_POST['email']) ||        !isset($_POST['telephone']) ||        !isset($_POST['comments'])) {        died('We are sorry, but there appears to be a problem with the form you submitted.');           }
   $to = $_POST["email"];
   $subject = $_POST["subject"];
   $message = $_POST["message"];
   $header = "From:abc@somedomain.com \r\n";
   $retval = mail ($to,$subject,$message,$header);
   if( $retval == true )  
   {
      echo "Message sent successfully...";
   }
   else
   {
      echo "Message could not be sent...";
   }
?>
</body>
</html>