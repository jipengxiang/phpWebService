<?php

// start a session. The session_start() function must appear BEFORE the <html> tag:
session_start();
// require the dbfunction.php file
require 'dbFunction.php';


$adminid = $_POST["adminID"]; // retrieve the adminid from login form
$mypassword = $_POST["password"]; // retrieve the password from login form

$con = getDbConnect(); // invoke the getDbConnect() function to get a database connection

if ($con) { // connection to database is successful
    // To protect MySQL injection (more detail about MySQL injection)
    $sqlQueryStr =
            "SELECT recordid,email " .
            "FROM account AC " .
            "WHERE AC.email = '$adminid' AND " .
            "AC.password= '$mypassword'";

    $result = mysql_query($sqlQueryStr, $con); // execute the SQL query
    //fetch the results as array.		
    $arResult = mysql_fetch_array($result);

    $row = mysql_num_rows($result);
    if ($row > 0) { // fetch the record
        // $_SESSION['basicinfo'] = $result; // put the record into the session
        $_SESSION['basicinfo'] = $arResult;
        header('Location: homepage.php'); // redirect to the homepage.
    } else {
        // header('Location: LoginPage.html'); // redirect to the login page.
        echo 'login not successful';
    }
    mysql_close(); // close database connection
} else {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
