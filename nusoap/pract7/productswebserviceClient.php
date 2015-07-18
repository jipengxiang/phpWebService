<?php

// Pull in the NuSOAP code
require_once('../lib/nusoap.php');
// Create the client instance
$uri='http://localhost/WSDPHP/nusoap/pract7/productsWebservice.php?wsdl';
$client = new soapclient($uri, true);
// Check for an error
$err = $client->getError();
if ($err) {
    // Display the error
    echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
    // At this point, you know the call that follows will fail
}
// Call the SOAP method

//http://sourceforge.net/p/nusoap/discussion/193579/thread/8464efe4/#3c6d
$result = $client->call('GetProductsByCode', array());
// Check for a fault
if ($client->fault) {
    echo '<h2>Fault</h2><pre>';
    print_r($result);
    echo '</pre>';
} else {
    // Check for errors
    $err = $client->getError();
    if ($err) {
        // Display the error
        echo '<h2>Error</h2><pre>' . $err . '</pre>';
    } else {
        // Display the result
        echo '<h2>Result</h2><pre>';
        print_r($result);
        echo '</pre>';
        //first row, column is name
        echo $result[0]['name'];
        //However, the syntax above becomes unpractical when dealing with large arrays, 
        //or when the name of the keys and values changed dynamically. 
        //In this case, the “foreach” function can be used to access an array recursively.
        foreach($result as $key => $list )
        {
            echo 'name  ' . $list['name'] . '<br/>'; 
        }
    }
}
// Display the request and response
echo '<h2>Request</h2>';
echo '<pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';
echo '<pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
// Display the debug messages
echo '<h2>Debug</h2>';
echo '<pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';
?>
