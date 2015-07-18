<?php
/*Destroy will reset your session, so don't call that function 
 * unless you are entirely comfortable losing all your stored session data!
 */
//resume a session
session_start();
// destroy the session
session_destroy();

// redirect to login page
header('Location: loginPage.html'); ;
?>

