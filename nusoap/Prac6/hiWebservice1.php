<?php
// Pull in the NuSOAP code
require_once('../lib/nusoap.php');
// Create the server instance
$server = new soap_server();
// Initialize WSDL support
$server->configureWSDL('hellowsdl', 'urn:hellowsdl');
// Register the method to expose
$server->register('hello', // method name
        array(), // input parameters
        array('return' => 'xsd:string'), // output parameters
        'urn:hellowsdl', // namespace
        'urn:hellowsdl#hello', // soapaction
        'rpc', // style
        'encoded', // use
        'Says hello to the caller'            // documentation
);

$server->register('hello1', // method name
        array('name' => 'xsd:string'), // input parameters
        array('return' => 'xsd:string'), // output parameters
        'urn:hellowsdl', // namespace
        'urn:hellowsdl#hello', // soapaction
        'rpc', // style
        'encoded', // use
        'Says hello to the caller'            // documentation
);

// Define the method as a PHP function
function hello1($name) {
     if (!$name) {
        return new soap_fault('Client', '', 'Put your name!');
    }
    return 'Hello, ' . $name;
}
// Define the method as a PHP function
function hello() {
        return 'Hello,  dear  friend';
}
//Get our posted data if the service is being consumed
// otherwise leave this data blank.

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
// pass our posted data (or nothing) to the soap service
$server->service($HTTP_RAW_POST_DATA);
?>
