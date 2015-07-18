<?php
$xmlProducts = simplexml_load_file("Products.xml");
echo $xmlProducts->getName() . "<br>";
echo "<ul id='productlist'>\n";
foreach ($xmlProducts as $product):  
    $make = $product->make;
    $model = $product->model;
    $price = $product->price;
    echo "<li><div class='title'>" . $make . "</div>
        <div class='model'> " . $model . "</div>
            <div class='price'>" . $price . "</div></li>\n";
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
