<?php

$xmlProducts = simplexml_load_file("Products.xml");
echo $xmlProducts->getName() . "<br>";
echo "<ul id='productlist'>\n";
foreach ($xmlProducts->xpath("/products/footwear[price>30]") as $footwear):
   
    echo "<li>
        <div class='model'> " . $footwear -> model . "</div> .
           </li>\n";
endforeach;
echo "</ul>";
//display the variable $xmlProducts
echo '<h2>xmlProducts</h2>';
echo '<pre>';
print_r($xmlProducts);
echo '</pre>';
echo 'the first product name: ';
echo '<b>' . $xmlProducts ->footwear[0]->make . '</b>';
?>
