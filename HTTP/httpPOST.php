<!--
http://www.tutorialspoint.com/php/php_get_post.htm
-->
<!DOCTYPE html>
<?php
if (isset($_POST["name"]) || isset($_POST["age"])) {
    echo '<h2>POST data using foreach</h2>';
    foreach ($_POST as $key => $value) {
        echo "{$key} = {$value}\r\n";
    }

  echo '<h2>DEBUG POST Result</h2><pre>';
        print_r($_POST);
        echo '</pre>';
    
 echo '<h2>POST data using index</h2>';
    echo "Welcome " . $_POST['name'] . "<br />";
    echo "You are " . $_POST['age'] . " years old.";
    
}
?>
<html>
    <body>
        <form action="<?php $_PHP_SELF ?>" method="POST">

            Name: <input type="text" name="name" />
            Age: <input type="text" name="age" />

            <input type="submit" />
        </form>
    </body>
</html>
