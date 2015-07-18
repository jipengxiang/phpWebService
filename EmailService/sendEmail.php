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
   $to = "jipx@sp.edu.sg";
   $subject = "This is subject";
   $message = "This is simple text message.";
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