<html>
    <head></head>
    <body>
        <?php
        $r = new HttpRequest('http://www.webservicex.net/globalweather.asmx', HttpRequest::METH_POST);
//set headers

        $arrayHeaderFields = array(
            "Host" => "www.webservicex.net",
            "SOAPAction" => "http://www.webserviceX.NET/GetWeather");
       
        $r->setContentType("text/xml; charset=utf-8");
       
        $r->setHeaders($arrayHeaderFields);

        //set the soap message for the request 
        $xmlSoapMessage = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
<soap:Body>
<GetWeather xmlns="http://www.webserviceX.NET">
<CityName>singapore</CityName>
<CountryName>singapore</CountryName>
</GetWeather>
</soap:Body>
</soap:Envelope>';

        $r->setBody($xmlSoapMessage);
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