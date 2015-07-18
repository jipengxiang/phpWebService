<html>
    <head></head>
    <body>
        <?php
        $r = new HttpRequest('http://www.webservicex.net/globalweather.asmx/GetWeather', HttpRequest::METH_GET);
//set headers
        $arrayHeaders = array("as_q" => "Web Service",
            "cityName" => "Singapore",
            "countryName" => "Singapore"
        );

        $r->addQueryData($arrayHeaders);
        try {
            $r->send();
            echo '<h2>Request Header</h2>';
            echo '<pre>';
            print_r($r->getRawRequestMessage());
            echo '</pre>';

            $responseCode = $r->getResponseCode();
            $responseHeader = $r->getResponseHeader();
            $responseBody = $r->getResponseBody();
//Removes whitespace at the beginning of a string.
            $responseBody = trim($responseBody);
//Do a little magic on the XML before giving it to SimpleXML: 
//find the "utf-16" in the <?xml tag and replace it with "utf-8"
            //
           // $responseBody = str_replace('<string xmlns="http://www.webserviceX.NET">', '', $responseBody);
          //  $reponseBody = str_replace('</string>', '', $responseBody);
            $responseBody = str_replace('<?xml version="1.0" encoding="utf-16"?>', '', $responseBody);
            //load the XML string in the variable $responseBody to an XML object
            //  $xmlWeather = new SimpleXMLElement($responseBody, NULL, FALSE);

            echo '<h2>Rseponse Body</h2>';
            echo '<pre>';
            print_r($responseBody);
            echo '</pre>';
        } catch (HttpException $ex) {
            echo $ex;
        }
        $xmlWeather = new SimpleXMLElement($responseBody);
        $temperature = $xmlWeather->Temperature;
        echo "temperature is  " . $temperature;

        echo '--------------------------------------------------------------------------------------------<br/>';
        echo '<h2>$xmlWeather</h2>';
        echo '<pre>';
        print_r($xmlWeather);
        echo '</pre>';
        echo '--------------------------------------------------------------------------------------------<br/>';
        echo '<h2>Rseponse Code</h2>';
        echo "resonse code " . $responseCode . "<br/>";
        // echo "resonse header" . $responseHeader["location"] . "<br/>";
        echo '<h2>Rseponse Header</h2>';
        echo '<pre>';
        print_r($responseHeader);
        echo '</pre>';


        // Display the request and response
        ?>

    </body>

</html>