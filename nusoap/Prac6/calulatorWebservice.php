<?php

// Pull in the NuSOAP code
require_once('../lib/nusoap.php');
// Create the server instance
$server = new soap_server();
// Initialize WSDL support
$server->configureWSDL('addwsdl', 'urn:addwsdl');
// Register the method to expose
$server->register('add', // method name
        array('num1' => 'xsd:int','num2' => 'xsd:int'), // input parameters
        array('return' => 'xsd:int'), // output parameters
        'urn:hellowsdl', // namespace
        'urn:hellowsdl#hello', // soapaction
        'rpc', // style
        'encoded', // use
        'Says hello to the caller'            // documentation
);

// Define the method as a PHP function
function add($num1,$num2) {
     if (!$num1 or !$num2) {
        return new soap_fault('Client', '', 'key in number!');
    }
    $result=$num1 +$num2;
    return $result;
}

// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>
