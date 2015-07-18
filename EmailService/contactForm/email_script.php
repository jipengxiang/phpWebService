<?php
if (isset($_POST['email'])) {
// EDIT THE 2 LINES BELOW AS REQUIRED  
    $to = "jipx@sp.edu.sg";
    $subject = "Your email subject line";

    function died($error) {
// your error code can go here 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error . "<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }

// validation expected data exists 
    if (!isset($_POST['first_name']) ||
            !isset($_POST['last_name']) ||
            !isset($_POST['email']) ||
            !isset($_POST['telephone']) ||
            !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }


    $header = "From:abc@somedomain.com \r\n";
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required 
    $email_from = $_POST['email']; // required   
    $telephone = $_POST['telephone']; // not required 
    $message = $_POST['message']; // required
    
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
    if (!preg_match($email_exp, $email_from)) {
        $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
    }
    $string_exp = "/^[A-Za-z .'-]+$/";
    if (!preg_match($string_exp, $first_name)) {
        $error_message .= 'The First Name you entered does not appear to be valid.<br />';
    }
    if (!preg_match($string_exp, $last_name)) {
        $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
    }
    if (strlen($message) < 2) {
        $error_message .= 'The Comments you entered do not appear to be valid.<br />';
    }
    if (strlen($error_message) > 0) {
        died($error_message);
    }
    $email_message = "Form details below.\n\n";

    function clean_string($string) {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "First Name: " . clean_string($first_name) . "\n";
    $email_message .= "Last Name: " . clean_string($last_name) . "\n";
    $email_message .= "Email: " . clean_string($email_from) . "\n";
    $email_message .= "Telephone: " . clean_string($telephone) . "\n";
    $email_message .= "message: " . clean_string($message) . "\n";

    $retval = mail($to, $subject, $email_message, $header);

    if ($retval == true) {
        echo "Message sent successfully...";
    } else {
        echo "Message could not be sent...";
    }
    ?>
    Thank you for contacting us. We will be in touch with you very soon. 
    <?php
}
?> 