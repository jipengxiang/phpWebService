<html>
    <head>
        <style type="text/css">
            .num {
                float: left;
                color: gray;
                font-size: 13px;
                font-family: monospace;
                text-align: right;
                margin-right: 6pt;
                padding-right: 6pt;
                border-right: 1px solid gray;}

            body {margin: 0px; margin-left: 5px;}
            td {vertical-align: top;}
            code {white-space: nowrap;}
        </style>   
    </head>

    <body>
        <?
       
        $ar = array('config.php', 'index.php', 'functions.php');    //array with files to denie
        $file = $_SERVER['CONTEXT_DOCUMENT_ROOT'] . $_GET['file']; 
       // iniziate the variable
        if (file_Exists($file)) {
            if (!in_array($file, $ar)) {    // check if it is prohibited
                highlight_num($file); //highlight file
            } else {     // prohibited file
                echo "You do not have permision to see the " . $file . " file.";
            }
        } else {    // file doesnt exist
            echo "That file does not exist.";
        }

        function highlight_num($file) {
            $lines = implode(range(1, count(file($file))), '<br />');
            $content = highlight_file($file, true);

            echo "<table><tr><td class=\"num\">\n$lines\n</td><td>\n$content\n</td></tr></table>";
        }
        ?>


    </body>

</html>