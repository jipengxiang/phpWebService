<!--
http://www.tutorialspoint.com/php/php_get_post.htm
-->
<!DOCTYPE html>
<?php
if (isset($_GET["name"]) || isset($_GET["age"])) {
    echo "Welcome " . $_GET['name'] . "<br />";
    echo "You are " . $_GET['age'] . " years old.";
    
}

echo '<h2>DEBUG GET Result</h2><pre>';

        print_r($_GET);
        echo '</pre>';
?>
<html>
    <body>
        <form action="<?php $_PHP_SELF ?>" method="GET">
            Name: <input type="text" name="name" />
            Age: <input type="text" name="age" />
            <input type="submit" />
        </form>
    </body>
</html>
