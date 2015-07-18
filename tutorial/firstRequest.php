
<?php
if (empty($_GET)) {
    ?>
    display result 1
    <?php
} else {
    echo $_SERVER['REQUEST_METHOD'];
}
?>

