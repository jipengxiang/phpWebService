<?php

$url = 'http://localhost/WSDPrac/GoogleMapApp/tutorial/tutorial1_8.php';
$data = array("email" => "lorna@example.com", "display_name" => "LornaJane");
$request = new HttpRequest($url, HTTP_METH_POST);
$request->setPostFields($data);
$request->send();
$page = $request->getResponseBody();
echo $page;
?>


