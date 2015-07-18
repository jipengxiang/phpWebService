<?php
// Written By Adam Khoury @ developphp.com - March 26, 2010
// PHP mobile browser detection ready Home Page(index file that detects and redirects)
// Simply find the device OS or browser label and place conditionals as needed
//http://www.developphp.com/view_lesson.php?v=309

$agent = $_SERVER['HTTP_USER_AGENT']; // Put browser name into local variable

if (preg_match("/iPhone/", $agent)) { // Apple iPhone Device
    // Send them to iphone sized homepage for mobile
    header("location: iphone_home.html");
} else if (preg_match("/Android/", $agent)) { // Google Device using Android OS
    // Send them to android sized homepage for mobile
    header("location: android_home.html");
}
?>
<html>
    <body>
        <h2>This is my regular homepage for people not using the devices defined in my script.</h2>
        <h3>If none of the user agents defined are detected, this page will display by default.</h3>
        <strong>You are viewing this page using:</strong><br />
        <em><?php echo $agent; ?></em>
    </body>
</html>