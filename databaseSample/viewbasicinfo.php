<?php
// require the checkLoginStatus.php file
// retrive the session information asociated with the user
require 'checkLoginStatus.php';

?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // include the headermenu.php  
        require 'headermenu.php';
        ?>


        <h3>Personal Details:</h3>
        
        <?php

        //display information from basicinfo
        echo "record ID: " .   $basicinfo['recordid'] . "<br />";  
       // echo "name: "      . ___________________ . "<br />";
       // echo "class: "     . ___________________ . "<br />";
        echo "email: "     .$basicinfo[1] . "<br />";
        //echo "contact: "   . ___________________ . "<br />";
        echo "<br>";
        ?>
        
    </body>
</html>

