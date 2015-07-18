<?php
if (file_exists("Products.xml")) 
    {
    //Convert the well-formed XML document 
    //in the given file "Products.xml" to an object.
    // $xmlProducts,an object of class SimpleXMLElement 
    //with properties 
    //containing the data held within the XML document, 
    //or FALSE on failure.
    $xmlProducts = simplexml_load_file("Products.xml");
    if (!$xmlProducts) {
        echo "error in processing XML";
    } else {

        echo $xmlProducts->getName() . "<br>";
        echo "<ul id='productlist'>\n";
        foreach ($xmlProducts as $footwear) {
            $make = $footwear->make;
            $model = $footwear->model;
            $price = $footwear->price;
            echo "<li><div class='title'>" . $make . "</div>
        <div class='model'> " . $model . "</div>
            <div class='price'>" . $price . "</div></li>\n";
        }
        echo "</ul>";
//display the variable $xmlProducts
        echo '<h2>xmlProducts</h2>';
        echo '<pre>';
        print_r($xmlProducts);
        echo '</pre>';
        echo 'the first product name: ';
        echo '<b>' . $xmlProducts->footwear[0]->make . '</b>';
        echo '<b>' . $xmlProducts->footwear[1]->make . '</b>';
        echo '<b>' . $xmlProducts->footwear[2]->make . '</b>';
    }
} else {
    echo " file does not exits";
}
?>
