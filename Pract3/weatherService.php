<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $country="america";
        $uri = "http://api.worldweatheronline.com/free/v1/weather.ashx?q=" .$country . "&format=xml&num_of_days=5&key=8fmd5gksfnerp24vu7s72cfr";
        
        //load the xml file from the above uri
        $myWeather = simplexml_load_file($uri);
        
//Cache the result from the web service
        $myWeather->asXML($country.".xml");
//process the xml, extract data from the xml        
        echo "<br/>";
        echo " the Current Condition ";
        echo $myWeather->current_condition->temp_C;
        echo "<br/>";
        echo "<br/>";

        echo " the Current Condition ";
        echo $myWeather->current_condition->weatherIconUrl;
        echo "<br/>";
        $img = $myWeather->current_condition->weatherIconUrl;
        echo "<img src=$img />";

        echo "<br/>";
        echo " the Max Temperature ";
        echo $myWeather->weather[0]->tempMaxC;
        echo "<br/>";


        echo "<br/>";
        echo " the Min Temperature ";
        echo $myWeather->weather[0]->tempMinC;
        echo "<br/>";
        echo "<br/>";
        echo '<pre>';
        print_r($myWeather);
        echo '</pre>';


        echo "<br/>";
        echo " the Min Temperature ";
        echo $myWeather->weather[0]->tempMinC;
        echo "<br/>";
        echo "<br/>";
        echo '<pre>';
        print_r($myWeather);
        echo '</pre>';

        $weathers = $myWeather->xpath('//weather[tempMaxC>=10]');

        foreach ($weathers as $weather) {
            echo "Found {$weather->tempMaxC}<br />";
            echo "Found {$weather->date}<br />";
        }

        echo "<br />";
        ?>

    </body>
</html>
