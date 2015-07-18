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
<table><tr>
<?php
    $url = 'http://uk.old.finance.yahoo.com/d/quotes.csv?s=GBPEUR=X&f=sl1d1t1ba&e=.csv';
    $fp = fopen($url, 'r');
    $data = fgetcsv($fp, 1000);
    foreach ($data as $value){
        print "<td>$value</td>";
    }
?>
</tr></table>
</body>
</html>

