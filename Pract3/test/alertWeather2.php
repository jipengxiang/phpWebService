<html>
    <head></head>
<?php
$xml = <<<XML
<?xml version = '1.0' encoding = 'UTF-8' standalone = 'yes'?>
<?xml-stylesheet href='http://alerts.weather.gov/cap/capatom.xsl' type='text/xsl'?>
<feed
    xmlns = 'http://www.w3.org/2005/Atom'
    xmlns:cap = 'urn:oasis:names:tc:emergency:cap:1.1'
    xmlns:ha = 'http://www.alerting.net/namespace/index_1.0'
    >
<!-- http-date = Tue, 07 May 2013 04:14:00 GMT -->

<id>http://alerts.weather.gov/cap/tx.atom</id>
<logo>http://alerts.weather.gov/images/xml_logo.gif</logo>
<generator>NWS CAP Server</generator>
<updated>2013-05-06T23:14:00-05:00</updated>
<author>
    <name>w-nws.webmaster1@noaa.gov</name>
</author>
<title>Current Watches, Warnings and Advisories for Texas Issued by the National Weather Service</title>
<link href='http://alerts.weather.gov/cap/tx.atom'/>

<entry>
    <id>http://alerts.weather.gov/cap/wwacapget.php?x=TX124EFFB8AA78.FireWeatherWatch.124EFFD70270TX.EPZRFWEPZ.1716207877d94d15d43d410892b9f175</id>
    <updated>2013-05-06T23:14:00-05:00</updated>
    <published>2013-05-06T23:14:00-05:00</published>
    <author>
        <name>w-nws.webmaster2@noaa.gov</name>
    </author>
    <title>Fire Weather Watch issued May 06 at 11:14PM CDT until May 08 at 10:00PM CDT by NWS</title>
    <link href="http://alerts.weather.gov/cap/wwacapget.php?x=TX124EFFB8AA78.FireWeatherWatch.124EFFD70270TX.EPZRFWEPZ.1716207877d94d15d43d410892b9f175"/>
    <summary>...CRITICAL FIRE CONDITIONS EXPECTED WEDNESDAY ACROSS FAR WEST TEXAS AND THE SOUTHWEST NEW MEXICO LOWLANDS... .WINDS ALOFT WILL STRENGTHEN OVER THE REGION EARLY THIS WEEK...AHEAD OF AN UPPER LEVEL TROUGH FORECAST TO MOVE THROUGH NEW MEXICO AND TEXAS ON WEDNESDAY. SURFACE LOW PRESSURE WILL ALSO DEVELOP TO OUR EAST AS THE TROUGH APPROACHES. THIS COMBINATION WILL RESULT</summary>
    <cap:event>Fire Weather Watch</cap:event>
    <cap:effective>2013-05-06T23:14:00-05:00</cap:effective>
    <cap:expires>2013-05-08T22:00:00-05:00</cap:expires>
    <cap:status>Actual</cap:status>
    <cap:msgType>Alert</cap:msgType>
    <cap:category>Met</cap:category>
    <cap:urgency>Future</cap:urgency>
    <cap:severity>Moderate</cap:severity>
    <cap:certainty>Possible</cap:certainty>
    <cap:areaDesc>El Paso; Hudspeth</cap:areaDesc>
    <cap:polygon></cap:polygon>
    <cap:geocode>
        <valueName>FIPS6</valueName>
        <value>048141 048229</value>
        <valueName>UGC</valueName>
        <value>TXZ055 TXZ056</value>
    </cap:geocode>
    <cap:parameter>
        <valueName>VTEC</valueName>
        <value>/O.NEW.KEPZ.FW.A.0018.130508T1900Z-130509T0300Z/</value>
    </cap:parameter>
</entry>

<entry>
    <id>http://alerts.weather.gov/cap/wwacapget.php?x=TX124EFFABB2F0.AirQualityAlert.124EFFC750DCTX.HGXAQAHGX.7f2cf548a67d403f0541492b2804d621</id>
    <updated>2013-05-06T14:16:00-05:00</updated>
    <published>2013-05-06T14:16:00-05:00</published>
    <author>
        <name>w-nws.webmaster@noaa.gov</name>
    </author>
    <title>Air Quality Alert issued May 06 at 2:16PM CDT by NWS</title>
    <link href="http://alerts.weather.gov/cap/wwacapget.php?x=TX124EFFABB2F0.AirQualityAlert.124EFFC750DCTX.HGXAQAHGX.7f2cf548a67d403f0541492b2804d621"/>
    <summary>...OZONE ACTION DAY FOR TUESDAY... THE TEXAS COMMISSION ON ENVIRONMENTAL QUALITY (TCEQ)...HAS ISSUED AN OZONE ACTION DAY FOR THE HOUSTON...GALVESTON...AND BRAZORIA AREAS FOR TUESDAY...MAY 7 2013. ATMOSPHERIC CONDITIONS ARE EXPECTED TO BE FAVORABLE FOR PRODUCING HIGH LEVELS OF OZONE POLLUTION IN THE HOUSTON...GALVESTON AND</summary>
    <cap:event>Air Quality Alert</cap:event>
    <cap:effective>2013-05-06T14:16:00-05:00</cap:effective>
    <cap:expires>2013-05-07T19:15:00-05:00</cap:expires>
    <cap:status>Actual</cap:status>
    <cap:msgType>Alert</cap:msgType>
    <cap:category>Met</cap:category>
    <cap:urgency>Unknown</cap:urgency>
    <cap:severity>Unknown</cap:severity>
    <cap:certainty>Unknown</cap:certainty>
    <cap:areaDesc>Brazoria; Galveston; Harris</cap:areaDesc>
    <cap:polygon></cap:polygon>
    <cap:geocode>
        <valueName>FIPS6</valueName>
        <value>048039 048167 048201</value>
        <valueName>UGC</valueName>
        <value>TXZ213 TXZ237 TXZ238</value>
    </cap:geocode>
    <cap:parameter>
        <valueName>VTEC</valueName>
        <value></value>
    </cap:parameter>
</entry>
</feed>
XML;

$sxe = new SimpleXMLElement($xml);
$capFields = $sxe->entry->children('cap', true);
echo "Result1: " .  $sxe->author->name  . "<br/>" ; 
echo "Result1: " .  $sxe->entry->author->name . "<br/>";
echo "Result2: " .  $capFields->category . "</br>";
echo "Result3: " .  $capFields->urgency . "<br/>";
echo "Result4: " . (string) $capFields->severity . "<br/>";
?>
</body>
</html>