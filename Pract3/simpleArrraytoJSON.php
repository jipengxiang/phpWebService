<?php

include ('class.ArraytoXML');

$myFruits = Array
    (
    Array
        (
        'fruit_id' => '1',
        'fruit_name' => 'Banana',
        'fruit_colour' => 'yellow',
        'price_per_kg' => '2,99'
    ),
    Array
        (
        'fruit_id' => '2',
        'fruit_name' => 'Orange',
        'fruit_colour' => 'orange',
        'price_per_kg' => '245'
    ),
    Array
        (
        'fruit_id' => '3',
        'fruit_name' => 'Strawberry',
        'fruit_colour' => 'red',
        'price_per_kg' => '4,99'
    )
);

//map array to JSON

$out = array_values($myFruits);
$strJSON= json_encode($out);
print_r($strJSON);
?>
