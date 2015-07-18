<?php

// Pull in the NuSOAP code
require_once('../lib/nusoap.php');
ini_set('soap.wsdl_cache_enabled', 0);
// Initialize WSDL support
$server = new soap_server();
// $myNamespace = $_SERVER['SCRIPT_URI'];
$myNamespace = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];
// Initialize WSDL support
$server->configureWSDL('product_wsdl', 'urn:' . $myNamespace);
$server->wsdl->addComplexType(
        'Product', // name
        'complexType', // typeClass (complexType|simpleType|attribute)
        'struct', // phpType: currently supported are array and struct (php assoc array)
        'all', // compositor (all|sequence|choice)
        '', // restrictionBase namespace:name (http://schemas.xmlsoap.org/soap/encoding/:Array)
        array(//  array ( name = array(name=>'',type=>'') )
    'name' => array('name' => 'name', 'type' => 'xsd:string'),
    'product_number' => array('name' => 'product_number', 'type' => 'xsd:string'),
    'price' => array('name' => 'price', 'type' => 'xsd:int'),
    'quantity' => array('name' => 'quantity', 'type' => 'xsd:int')
        )
);
$server->register('GetOneProduct', // method name
        array(), // input parameters
        array('return' => 'tns:Product'), // output parameters
        'urn:product_wsdl', // namespace
        'urn:product_wsdl#hello', // soapaction
        'rpc', // style
        'encoded', // use
        'Says hello to the caller'            // documentation
);

function GetOneProduct() {
    $product = array(
        'name' => 'somthing',
        'product_number' => '23456yui',
        'price' => 222,
        'quantity' => 5);
    return $product;
}

//Get our posted data if the service is being consumed
// otherwise leave this data blank.
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
// pass our posted data (or nothing) to the soap service
$server->service($HTTP_RAW_POST_DATA);
?>
