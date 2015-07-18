<?php

// Pull in the NuSOAP code
require_once('../lib/nusoap.php');
// Create the server instance
$server = new nusoap_server;

$server->configureWSDL('server', 'urn:server');

$server->wsdl->schemaTargetNamespace = 'urn:server';

$server->register('pollServer', array('value' => 'xsd:string'), array('return' => 'xsd:string'), 'urn:server', 'urn:server#pollServer');

function pollServer($value) {

    if ($value['value'] == 'Good') {

        return "The value of the server poll resulted in good information";
    } else {

        return "The value of the server poll showed poor information";
    }
}

//Get our posted data if the service is being consumed
// otherwise leave this data blank.

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
// pass our posted data (or nothing) to the soap service
$server->service($HTTP_RAW_POST_DATA);
?>
