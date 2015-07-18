<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$myFruits = simplexml_load_file("fruits.xml");
echo $myFruits->getName() . "<br>";

echo "<ul id='songlist'>\n";
foreach ($myFruits as $fruit):
    $fruit_id = $fruit->fruit_id;
    $fruit_name = $fruit->fruit_name;
    $fruit_colour = $fruit->fruit_colour;
    $price_per_kg = $fruit->price_per_kg;
    echo "<li><div class='title'>". $fruit_id ."</div><div class='artist'> " . $fruit_name . "</div><div>" . $fruit_colour ."</div></li>\n";
endforeach;
echo "</ul>";
?>
