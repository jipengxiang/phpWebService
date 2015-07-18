<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$fruits = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<fruits>
   <fruit>
      <fruit_id>1</fruit_id>
      <fruit_name>Banana</fruit_name>
      <fruit_colour>yellow</fruit_colour>
      <price_per_kg>2,99</price_per_kg>
   </fruit>
   <fruit>
      <fruit_id>2</fruit_id>
      <fruit_name>Orange</fruit_name>
      <fruit_colour>orange</fruit_colour>
      <price_per_kg>2,45</price_per_kg>
   </fruit>
   <fruit>
      <fruit_id>3</fruit_id>
      <fruit_name>Strawberry</fruit_name>
      <fruit_colour>red</fruit_colour>
      <price_per_kg>4,99</price_per_kg>
   </fruit>
</fruits> 
XML;

$xmlmyFruits = simplexml_load_string($fruits);
echo $xmlmyFruits->getName() . "<br>";
echo "<ul id='songlist'>\n";
foreach ($xmlmyFruits as $fruit):

    $fruit_id = $fruit->fruit_id;
    $fruit_name = $fruit->fruit_name;
    $fruit_colour = $fruit->fruit_colour;
    $price_per_kg = $fruit->price_per_kg;
    echo "<li><div class='title'>" . $fruit_id . "</div><div class='artist'> " . $fruit_name . "</div><div>" . $fruit_colour . "</div></li>\n";
endforeach;
echo "</ul>";

//extract the node
echo 'the first fruit name: ';
echo '<b>' . $xmlmyFruits->fruit[0]->fruit_name . '</b>';

?>

