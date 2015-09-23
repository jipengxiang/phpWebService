<!-- Originally created by John Dimm http://webspeechapi.blogspot.co.uk/2013/04/how-to-use-new-bing-translator-api-with.html -->

<?php
$ClientID="jipxAPP";
$ClientSecret="i/4gYe3TsqAOT2M7ob5II70L3OEY7qE1aTGo+1ek3C0=";

$ClientSecret = urlencode ($ClientSecret);
$ClientID = urlencode($ClientID);

// Get a 10-minute access token for Microsoft Translator API.
$url = "https://datamarket.accesscontrol.windows.net/v2/OAuth2-13";
$postParams = "grant_type=client_credentials&client_id=$ClientID&client_secret=$ClientSecret&scope=http://api.microsofttranslator.com";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $postParams);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);  
$rsp = curl_exec($ch); 

print $rsp;
?>