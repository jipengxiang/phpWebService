<?php

// start a session or resumes a session
session_start();


if (isset($_SESSION['basicinfo'])) { // basicinfo exist in session
    $basicinfo = $_SESSION['basicinfo']; // get basicinfo from session
} else {
    header('Location: LoginPage.html'); // redirect to the login page.
}
?>
