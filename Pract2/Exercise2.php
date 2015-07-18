<html>
    <head></head>
    <body>
        <?php
        $r = new HttpRequest('http://www.webservicex.net/globalweather.asmx/GetWeather', HttpRequest::METH_GET);
//set headers
        $arrayHeaders = array("as_q" => "Web Service",
            "cityName" => "Singapore",
            "countryName" =>"Singapore"
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
            echo '--------------------------------------------------------------------------------------------<br/>';
            echo '<h2>Rseponse Code</h2>';
            echo "resonse code " . $responseCode . "<br/>";
            // echo "resonse header" . $responseHeader["location"] . "<br/>";
            echo '<h2>Rseponse Header</h2>';
            echo '<pre>';
            print_r($responseHeader);
            echo '</pre>';

            echo '<h2>Rseponse Body</h2>';
            echo '<pre>';
            print_r($responseBody);
            echo '</pre>';
            } catch (HttpException $ex) {
            echo $ex;
        }
        // Display the request and response
        ?>

    </body>

</html>