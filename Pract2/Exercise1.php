<html>
    <head></head>
    <body>
        <?php
        $r = new HttpRequest('http://twitter.com/', HttpRequest::METH_GET);

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
            //    print_r($responseBody);
            echo '</pre>';
            // display Header location field";

            if (isset($responseHeader["Location"])) {
                echo '<h2>Rseponse Header Location</h2>';
                echo '<pre>';
                print_r($responseHeader["Location"]);
                echo '</pre>';
                echo 'hiii';
            }
        } catch (HttpException $ex) {
            echo $ex;
        }
        // Display the request and response
        ?>
       
        <textarea rows="50" cols="100"> 
            <?php
           
            echo htmlspecialchars($responseBody); ?>
          
    </textarea>
    </body>

</html>