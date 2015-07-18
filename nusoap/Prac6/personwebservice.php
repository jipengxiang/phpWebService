<?php
// Pull in the NuSOAP code
require_once('../lib/nusoap.php');
// Create the server instance
$server = new soap_server();
// Initialize WSDL support
$server->configureWSDL('personwsdl', 'urn:personwsdl');
// Register the method to expose
// Register the data structures used by the service
$server->wsdl->addComplexType(
        'Person', 'complexType', 'struct', 'all', '', 
        array(
    'firstname' => array('name' => 'firstname', 'type' => 'xsd:string'),
    'age' => array('name' => 'age', 'type' => 'xsd:int'),
    'gender' => array('name' => 'gender', 'type' => 'xsd:string')
        )
);
$server->wsdl->addComplexType(
        'SweepstakesGreeting', 'complexType', 'struct', 'all', '', array(
    'greeting' => array('name' => 'greeting', 'type' => 'xsd:string'),
    'winner' => array('name' => 'winner', 'type' => 'xsd:boolean')
        )
);
// Register the method to expose
$server->register('hello', // method name
        array('person' => 'tns:Person'), // input parameters
        array('return' => 'tns:SweepstakesGreeting'), // output parameters
        'urn:personwsdl', // namespace
        'urn:personwsdl#hello', // soapaction
        'rpc', // style
        'encoded', // use
        'Greet a person entering the sweepstakes'        // documentation
);

// Define the method as a PHP function
function hello($person) {
    $greeting = 'Hello, ' . $person['firstname'] .
            '. It is nice to meet a ' . $person['age'] .
            ' year old ' . $person['gender'] . '.';

    $winner = $person['firstname'] == 'Scott';

    return array(
        'greeting' => $greeting,
        'winner' => $winner
    );
}

//Get our posted data if the service is being consumed
// otherwise leave this data blank.

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
// pass our posted data (or nothing) to the soap service
$server->service($HTTP_RAW_POST_DATA);

?>
