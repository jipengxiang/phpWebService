<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>handle sum</title>
        <style>
            body {
                text-align :center;
                font-family: monospace;
            }
        </style>
    </head>
    <body>
        <?php
            $value1 = $_POST["value1"];
            $value2 = $_POST["value2"];
            
            $sum = $value1 +$value2;
            
            echo 'Sum of '. $value1 .' and ' .$value2 .' is '.  $sum;
        ?>
        <a href="sumNumberForm.html">do another calculation</a>
    </body>
</html>

