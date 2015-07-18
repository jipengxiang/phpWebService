<?php

$doc = new DOMDocument();
$doc->load('http://weather.yahooapis.com/forecastrss?p=VEXX0024&u=c');
$channel = $doc->getElementsByTagName("channel");
foreach ($channel as $chnl) {
    $item = $chnl->getElementsByTagName("item");
    foreach ($item as $itemgotten) {
        $describe = $itemgotten->getElementsByTagName("description");
        $description = $describe->item(0)->nodeValue;
        echo $description;
    }
    /* attributes code, temp, text  
     * The key is that you have to use getElementsByTagNameNS instead of getElementsByTagName 
     * and specify "http://xml.weather.yahoo.com/ns/rss/1.0" as the namespace.
      You know yweather is a shortcut for http://xml.weather.yahoo.com/ns/rss/1.0
     * because the XML file includes a xmls attribute:
      <rss version="2.0" xmlns:yweather="http://xml.weather.yahoo.com/ns/rss/1.0"
      xmlns:geo="http://www.w3.org/2003/01/geo/wgs84_pos#">
     * 
     */

    echo "temp: " . $itemgotten->getElementsByTagNameNS(
                    "http://xml.weather.yahoo.com/ns/rss/1.0", "condition")->item(0)->
            getAttribute("temp");
}
?>