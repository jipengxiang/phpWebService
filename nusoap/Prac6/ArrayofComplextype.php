<?php

// Pull in the NuSOAP code
require_once('../lib/nusoap.php');
// Create the server instance
$server = new soap_server();
// Initialize WSDL support
$server->configureWSDL('getallbook', 'urn:getallbook');

$server->wsdl->addComplexType(
        'Book', 'complexType', 'struct', 'all', '', array(
    'title' => array('name' => 'title', 'type' => 'xsd:string'),
    'author' => array('name' => 'author', 'type' => 'xsd:int'),
    'publisher' => array('name' => 'publisher', 'type' => 'xsd:string')
        )
       );
$server->wsdl->addComplexType(
         'BookArray', 'complexType','array','','SOAP-ENC:Array',array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:Book[]')
    ),'tns:Book');

// Register the method to expose
$server->register('getallbook', // method name
        array('name' => 'xsd:string'), // input parameters
        array('return' => 'xsd:BookArray'), // output parameters
        $_SERVER['PHP_SELF'], // namespace
        'urn:'.$_SERVER['PHP_SELF'].'#getallbook', // soapaction
        'rpc', // style
        'encoded', // use
        'return array of books to the caller'            // documentation
);

// Define the method as a PHP name
function getallbook($name) {
    $database_name = 'testdb';
    $conn = mysql_connect('localhost', 'root', '');
    mysql_select_db($database_name);
    $sqlQueryStr = "SELECT * FROM BOOK";

    $result = mysql_query($sqlQueryStr, $conn); // execute the SQL query
    //fetch the results as array.		

  /*  while ($row = mysql_fetch_assoc($result)) {
        $items[] = array('cd' => $row['cd'],
            'title' => $row['title'],
            'author' => $row['author'],
            'publisher' => $row['publisher']);
    }*/
    $items= array();
    $items[]=array('cd' => 'newCD 1',
            'title' => 'title 1',
            'author' => 'author1',
            'publisher' => 'publisher 1');
    
     $items[]=array('cd' => 'newCD 2',
            'title' => 'title 2',
            'author' => 'author2',
            'publisher' => 'publisher 2');
    return $items;
}

//Get our posted data if the service is being consumed
// otherwise leave this data blank.

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
// pass our posted data (or nothing) to the soap service
$server->service($HTTP_RAW_POST_DATA);
?>
