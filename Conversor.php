<?php

require_once('nusoap/lib/nusoap.php');
 
//This is your webservice server WSDL URL address
$wsdl = "http://www.banguat.gob.gt/variables/ws/TipoCambio.asmx?wsdl";
 
//create client object
$client = new nusoap_client($wsdl, 'wsdl');
 
$err = $client->getError();
if ($err) {
	// Display the error
	echo '<h2>Constructor error</h2>' . $err;
	// At this point, you know the call that follows will fail
        exit();
}
 
//calling our first simple entry point

$result1=$client->call('TipoCambioDiaString');


print_r($result1["TipoCambioDiaStringResult"]);
?>