<?php

$data = "http://alerts.weather.gov/cap/tx.php?x=1";
$entries = file_get_contents($data);
$entries = new SimpleXmlElement($entries);
if (count($entries)):
    //echo "<pre>";print_r($entries);die;
    //alternate way other than registring NameSpace
    //$asin = $asins->xpath("//*[local-name() = 'ASIN']");

    $entries->registerXPathNamespace('prefix', 'http://www.w3.org/2005/Atom');
    $result = $entries->xpath("//prefix:entry");
    //echo count($asin);
    //echo "<pre>";print_r($result);die;
    foreach ($result as $entry):
        //echo "<pre>";print_r($entry);die;
        $dc = $entry->children('urn:oasis:names:tc:emergency:cap:1.1');
        echo $dc->event . "<br/>";
        echo $dc->effective . "<br/>";
        echo "<hr>";
    endforeach;
endif;