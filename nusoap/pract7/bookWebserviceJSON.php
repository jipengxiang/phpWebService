<?php

// Pull in the NuSOAP code
require_once('../lib/nusoap.php');
// Create the server instance
$server = new soap_server();
// Initialize WSDL support
$server->configureWSDL('getallbook', 'urn:getallbook');

// Register the method to expose
$server->register('getallbook', // method name
        array('name' => 'xsd:string'), // input parameters
        array('return' => 'xsd:string'), // output parameters
        'urn:getallbook', // namespace
        'urn:getallbook#getallbook', // soapaction
        'rpc', // style
        'encoded', // use
        'return all books to the caller'            // documentation
);

// Define the method as a PHP name
function getallbook($name) {
    
    $conn = getDbConnect();
   
    $sqlQueryStr = "SELECT * FROM BOOK";

    $result = mysql_query($sqlQueryStr, $conn); // execute the SQL query
    //fetch the results as array.		

    while ($row = mysql_fetch_array($result)) {
        $items[] = array('cd' => $row['cd'],
            'title' => $row['title'],
            'author' => $row['author'],
            'publisher' => $row['publisher']);
    }
    return json_encode($items);
}
function getDbConnect() {

    $host = "localhost:3306"; // Host name 
    $username = "root"; // Mysql username 
    $password = ""; // Mysql password 
    $db_name = "testdb"; // Database name 
// Connect to server and select databse.
    $con = mysql_connect("$host", "$username", "$password");
    mysql_select_db("$db_name") or die("cannot select DB");

 
    return $con;
}
///Get our posted data if the service is being consumed
// otherwise leave this data blank.

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
// pass our posted data (or nothing) to the soap service
$server->service($HTTP_RAW_POST_DATA);
?>
