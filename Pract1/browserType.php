<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        function get_user_browser() {
            $u_agent = $_SERVER['HTTP_USER_AGENT'];
            $ub = '';
            if (preg_match('/MSIE/i', $u_agent)) {
                $ub = "ie";
            } elseif (preg_match('/Firefox/i', $u_agent)) {
                $ub = "firefox";
            } elseif (preg_match('/Safari/i', $u_agent)) {
                $ub = "safari";
            } elseif (preg_match('/Chrome/i', $u_agent)) {
                $ub = "chrome";
            } elseif (preg_match('/Flock/i', $u_agent)) {
                $ub = "flock";
            } elseif (preg_match('/Opera/i', $u_agent)) {
                $ub = "opera";
            }

            return $ub;
        }

        echo $_SERVER['PHP_SELF'];
        echo $_SERVER['HTTP_USER_AGENT'] . "<br/>";
        echo "I know your browser type : " . get_user_browser();
        echo "I know your IP address : " . $_SERVER['REMOTE_ADDR'];
 echo "I know your IP address : " . $_SERVER['SERVER_SOFTWARE'];
        echo '<h2>DEBUG SERVER Reslt</h2><pre>';
        print_r($_SERVER);
        echo '</pre>';
        $query_string = 'file=' . urlencode($_SERVER['PHP_SELF']);
        echo '<a href=../userFunctions/viewSource.php?' . htmlentities($query_string) . '>' . 'view source </a>';
        ?>
    </body>
</html>
