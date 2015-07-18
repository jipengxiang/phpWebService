<?php

function getDbConnect() {

    $host = "localhost:3306"; // Host name 
    $username = "root"; // Mysql username 
    $password = ""; // Mysql password 
    $db_name = "studentacad"; // Database name 
// Connect to server and select databse.
    $con = mysql_connect("$host", "$username", "$password");
    mysql_select_db("$db_name") or die("cannot select DB");

 
    return $con;
}
?>

