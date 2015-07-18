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
        // define directory path
        $dir = ".";
        $image = exif_thumbnail($dir . "/" . $_GET['file']);
        header("Content-Type: image/jpeg");
        echo $image;
        ?>

    </body>
</html>
