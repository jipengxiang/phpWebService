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

$server->wsdl->addComplexType(
        'ProductArray', //Name
        'complexType', // typeClass (complexType|simpleType|attribute)
        'array', // phpType: currently supported are array and struct (php assoc array)
        '', // compositor (all|sequence|choice)
        'SOAP-ENC:Array', // restrictionBase namespace:name (http://schemas.xmlsoap.org/soap/encoding/:Array)
        array(), //array ( name = array(name=>'',type=>'') 
        array(// attrs
    array('ref' => 'SOAP-ENC:arrayType',
        'wsdl:arrayType' => 'tns:Product[]')
        ), 'tns:Product'
);

// Register the method to expose
$server->register('GetProductsByCode', // method name
        array(), // input parameters
        array('return' => 'tns:ProductArray'), // output parameters tns:ProductArray
        'urn:product_wsdl', // namespace
        'urn:product_wsdl#GetProductsByCode', // soapaction
        'rpc', // style
        'encoded', // use
        'Get Customer Information'        // documentation
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
$server->register('hello', // method name
        array(), // input parameters
        array('return' => 'xsd:string'), // output parameters
        'urn:product_wsdl', // namespace
        'urn:product_wsdl#hello', // soapaction
        'rpc', // style
        'encoded', // use
        'Says hello to the caller'            // documentation
);

function GetProductsByCode() {
    $productArray = array();
    for ($i = 0; $i < 5; $i++) {
        $product = array('name' => 'somthing' . $i,
            'product_number' => '23456yui' . $i,
            'price' => 222 * ($i + 1),
            'quantity' => 5 + $i
        );
        array_push($productArray, $product);
    }
    return $productArray;
}

function GetOneProduct() {
    $product = array(
        'name' => 'somthing',
        'product_number' => '23456yui',
        'price' => 222,
        'quantity' => 5);
    return $product;
}

function hello() {
    return 'Hello,  dear  friend';
}

//Get our posted data if the service is being consumed
// otherwise leave this data blank.

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
// pass our posted data (or nothing) to the soap service
$server->service($HTTP_RAW_POST_DATA);
?>
