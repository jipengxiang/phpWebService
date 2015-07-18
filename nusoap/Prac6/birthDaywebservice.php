<?php

//call library
require_once ('../lib/nusoap.php');

//using soap_server to create server object
$server = new soap_server;

$server->configureWSDL('agewsdl', 'urn:agewsdl');
// Register the method to expose
$server->register('find_age', // method name
        array('name' => 'xsd:string', 'birthday' => 'xsd:date'), // input parameters
        array('age' => 'xsd:integer'), // output parameters
        'urn:agewsdl', // namespace
        'urn:agewsdl#find_age', // soapaction
        'rpc', // style
        'encoded', // use
        'find the age'            // documentation
);

$server->register('find_ageArray', // method name
        array('name' => 'xsd:string', 'birthday' => 'xsd:date'), // input parameters
        array('name' => 'xsd:string', 'age' => 'xsd:integer'), // output parameters
        'urn:agewsdl', // namespace
        'urn:agewsdl#find_ageArray', // soapaction
        'rpc', // style
        'encoded', // use
        'find the age'            // documentation
);

// create age calculation function
function find_age($name,$birthday) {
    if (!$name) {
        return new soap_fault('Client', '', 'Put your name anf your birthday!');
    }
    list($byear, $bmonth, $bday) = explode('-', $birthday);
    list($cyear, $cmonth, $cday) = explode('-', date('Y-m-d'));

    $cday -= $bday;
    $cmonth -= $bmonth;
    $cyear -= $byear;

    if ($cday < 0)
        $cmonth--;
    if ($cmonth < 0)
        $cyear--;
    //$result = array('name' => $name, 'age' => $cyear);
    return $cyear;
}

function find_ageArray($name,$birthday) {
    if (!$name) {
        return new soap_fault('Client', '', 'Put your name anf your birthday!');
    }
    list($byear, $bmonth, $bday) = explode('-', $birthday);
    list($cyear, $cmonth, $cday) = explode('-', date('Y-m-d'));

    $cday -= $bday;
    $cmonth -= $bmonth;
    $cyear -= $byear;

    if ($cday < 0)
        $cmonth--;
    if ($cmonth < 0)
        $cyear--;
    $result = array('name' => $name, 'age' => $cyear);
    return $result;
}

//Get our posted data if the service is being consumed
// otherwise leave this data blank.

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
// pass our posted data (or nothing) to the soap service
$server->service($HTTP_RAW_POST_DATA);

exit();
?>
