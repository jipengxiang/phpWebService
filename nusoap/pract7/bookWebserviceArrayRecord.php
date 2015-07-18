<?php

// Pull in the NuSOAP code
require_once('../lib/nusoap.php');
// Create the server instance
$server = new soap_server();
// $myNamespace = $_SERVER['SCRIPT_URI'];
$myNamespace = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];

// Initialize WSDL support
$server->configureWSDL('book_wsdl', 'urn:' . $myNamespace);

$server->wsdl->addComplexType(
        'Book', // name
        'complexType', // typeClass (complexType|simpleType|attribute)
        'struct', // phpType: currently supported are array and struct (php assoc array)
        'all', // compositor (all|sequence|choice)
        '', // restrictionBase namespace:name (http://schemas.xmlsoap.org/soap/encoding/:Array)
        array(//  array ( name = array(name=>'',type=>'') )
    'cd' => array('name' => 'cd', 'type' => 'xsd:string'),
    'title' => array('name' => 'title', 'type' => 'xsd:string'),
    'author' => array('name' => 'author', 'type' => 'xsd:string'),
    'publisher' => array('name' => 'publisher', 'type' => 'xsd:string')
        )
);

$server->wsdl->addComplexType(
        'BookArray', //Name
        'complexType', // typeClass (complexType|simpleType|attribute)
        'array', // phpType: currently supported are array and struct (php assoc array)
        '', // compositor (all|sequence|choice)
        'SOAP-ENC:Array', // restrictionBase namespace:name (http://schemas.xmlsoap.org/soap/encoding/:Array)
        array(), //array ( name = array(name=>'',type=>'') 
        array(// attrs
    array('ref' => 'SOAP-ENC:arrayType',
        'wsdl:arrayType' => 'tns:Book[]')
        ), 'tns:Book'
);

// Register the method to expose
$server->register('registerbook', // method name
        array('cd' => 'xsd:string',
    'title' => 'xsd:string',
    'author' => 'xsd:string',
    'publisher' => 'xsd:string'), // input parameters
        array('return' => 'xsd:int'), // output parameters
        'urn:book_wsdl', // namespace
        'urn:book_wsdl#registerbook', // soapaction
        'rpc', // style
        'encoded', // use
        'return all books to the caller'            // documentation
);

// Register the method to expose
$server->register('registerbookSecure', // method name
        array('cd' => 'xsd:string',
    'title' => 'xsd:string',
    'author' => 'xsd:string',
    'publisher' => 'xsd:string'), // input parameters
        array('return' => 'xsd:int'), // output parameters
        'urn:book_wsdl', // namespace
        'urn:book_wsdl#registerbookSecure', // soapaction
        'rpc', // style
        'encoded', // use
        'return all books to the caller'            // documentation
);

// Register the method to expose
$server->register('getallbooks', // method name
        array('name' => 'xsd:string'), // input parameters
        array('return' => 'tns:BookArray'), // output parameters
        'urn:book_wsdl', // namespace
        'urn:book_wsdl#getallbooks', // soapaction
        'rpc', // style
        'encoded', // use
        'add one book'            // documentation
);

// Define the method as a PHP name
function getallbooks($name) {

    $conn = getDbConnect();

    $sqlQueryStr = "SELECT * FROM BOOK";

    $result = mysql_query($sqlQueryStr, $conn); // execute the SQL query
    //fetch the results as array.		
    $bookArray = array();
    while ($row = mysql_fetch_array($result)) {
        $book = array('cd' => $row['cd'],
            'title' => $row['title'],
            'author' => $row['author'],
            'publisher' => $row['publisher']);
        array_push($bookArray, $book);
    }

    return $bookArray;
}

function registerbook($cd, $title, $author, $publisher) {
//validatet he input parameters
    if (!$cd) {
        return new soap_fault('Client', '', 'Put your CD!');
    }
    if (!$title) {
        return new soap_fault('Client', '', 'Put your CD!');
    }
    if (!$author) {
        return new soap_fault('Client', '', 'Put your CD!');
    }
    if (!$publisher) {
        return new soap_fault('Client', '', 'Put your CD!');
    }

    $conn = getDbConnectSecure();
    if (!$conn) {
        return new soap_fault('Client', '', 'Service error, pls try again later');
    }
    $sqlPrepQueryStr = "SELECT cd FROM BOOK WHERE cd = '$cd' LIMIT 1";
    $resultCD = mysql_query($sqlPrepQueryStr, $conn); // execute the SQL query

    if (mysql_num_rows($resultCD) == 1) {
        return new soap_fault('Client', '', 'cd record exisits already!');
    }
    $sqlQueryStr = "INSERT INTO BOOK(cd, title,author,publisher) 
        Values('$cd', '$title', '$author','$publisher')";

    $result = mysql_query($sqlQueryStr, $conn); // execute the SQL query

    if ($result == 1) {
        return $result;
    }
    return new soap_fault('Client', '', 'could not add the record!');
}

function registerbookSecure($cd, $title, $author, $publisher) {

//use $mysqli---------mysql improved
    //prepartory statement is used to prevent SQL injection
    //
 /*
     * Once PHP has been installed, some configuration is required to enable mysqli and 
     * specify the client library you want it to use.
     *  The mysqli extension is not enabled by default, so the php_mysqli.dll 
     * DLL must be enabled inside of php.ini. 
     * In order to do this you need to find the php.ini file (typically located in c:\php), 
     * and make sure you remove the comment (semi-colon) from the start of the line 
     * extension=php_mysqli.dll, in the section marked [PHP_MYSQLI].
     * http://www.php.net/manual/en/mysqli.installation.php
     * 
     */
//validatet he input parameters
    if (!$cd) {
        return new soap_fault('Client', '', 'Put your CD!');
    }
    if (!$title) {
        return new soap_fault('Client', '', 'Put your CD!');
    }
    if (!$author) {
        return new soap_fault('Client', '', 'Put your CD!');
    }
    if (!$publisher) {
        return new soap_fault('Client', '', 'Put your CD!');
    }

    $mysqli = getDbConnectSecure();
    if (!$mysqli) {
        return new soap_fault('Client', '', 'Service error, pls try again later');
    }

    $prep_stmt = "SELECT cd FROM BOOK WHERE cd = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);

    if ($stmt) {
        // s for string, d for double, i for integer,b for blob
        //http://www.php.net/manual/en/mysqli-stmt.bind-param.php
        $stmt->bind_param('s', $cd);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            // A CD with this number address already exists
            return new soap_fault('Client', '', 'cd record exisits already!');
        }
    } else {
        return new soap_fault('Client', '', 'database error!');
    }

    $prep_stmt = "INSERT INTO BOOK(cd, title,author,publisher) 
        Values(?,?,?,?)";
    $insert_stmt = $mysqli->prepare($prep_stmt);
    if ($insert_stmt) {
        $insert_stmt->bind_param('ssss', $cd, $title, $author, $publisher);
        $result = $insert_stmt->execute();
        if (!$result) {
            return new soap_fault('Client', '', 'database error!');
        } else {

            return $result;
        }
    }
    else
        return new soap_fault('Client', '', 'could not add the record!');
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

function getDbConnectSecure() {

    $host = "localhost:3306"; // Host name 
    $username = "root"; // Mysql username 
    $password = ""; // Mysql password 
    $db_name = "testdb"; // Database name 
// Connect to server and select databse.
    $mysqli = mysqli_connect("$host", "$username", "$password", "$db_name");

    return $mysqli;
}

///Get our posted data if the service is being consumed
// otherwise leave this data blank.

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
// pass our posted data (or nothing) to the soap service
$server->service($HTTP_RAW_POST_DATA);
?>