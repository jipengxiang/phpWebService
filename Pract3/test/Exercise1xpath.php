<?php
$xmlDeviceRules = simplexml_load_file("MobileDevice.xsd");
echo $xmlDeviceRules->getName() . "<br>";
echo "<ul id='productlist'>\n";

//display the variable $xmlProducts
echo '<h2>xmlDeviceRules</h2>';
echo '<pre>';
print_r($xmlDeviceRules);
echo '</pre>';
echo 'the first product name: ';
//echo '<b>' . $xmlDeviceRules ->element[0]->complexType-> . '</b>';
?>
