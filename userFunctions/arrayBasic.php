<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        /*
         * Associative arrays are arrays that use named keys that you assign to them.
          There are two ways to create an associative array:
         */
        $age = array("Peter" => "35", "Ben" => "37", "Joe" => "43");
        /*
         * $age['Peter']="35";
          $age['Ben']="37";
          $age['Joe']="43";
         */

        echo "Peter is " . $age['Peter'] . " years old.";

        /*
         * To loop through and print all the values of an associative array, y
         * ou could use a foreach loop, like this:
         */
        foreach ($age as $x => $x_value) {
            echo "Key=" . $x . ", Value=" . $x_value;
            echo "<br>";
        }
        ?>


    </body>
</html>
