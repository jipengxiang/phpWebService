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
      $responseBody='<?xml version="1.0" encoding="utf-8"?>
<CurrentWeather>
  <Location>Singapore / Changi Airport, Singapore (WSSS) 01-22N 103-59E 16M</Location>
  <Time>Nov 19, 2013 - 02:30 AM EST / 2013.11.19 0730 UTC</Time>
  <Wind> from the N (010 degrees) at 5 MPH (4 KT) (direction variable):0</Wind>
  <Visibility> greater than 7 mile(s):0</Visibility>
  <SkyConditions> partly cloudy</SkyConditions>
  <Temperature> 87 F (31 C)</Temperature>
  <DewPoint> 71 F (22 C)</DewPoint>
  <RelativeHumidity> 58%</RelativeHumidity>
  <Pressure> 29.71 in. Hg (1006 hPa)</Pressure>
  <Status>Success</Status>
</CurrentWeather>';
//load the XML string in the variable $responseBody to an XML object
         
            $xmlWeather = new SimpleXMLElement($responseBody);
            $temperature = $xmlWeather->Temperature;
            echo "temperature is  " .$temperature;
                    
            
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