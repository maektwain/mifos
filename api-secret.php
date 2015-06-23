<?php

	//API URL.

	$username = "mifos";
	$password = "1234";

	$url = "https://control.decimus.in:8443/mifosng-provider/api/v1/authentication?username=" . $username . "&password=" . $password . "&tenantIdentifier=default&pretty=true";

	$ch = curl_init();
	curl_setopt( $ch, CURLOPT_URL, $url );
	curl_setopt( $ch, CURLOPT_HTTPHEADER, array ('Accept: application/json', 'Content-Length: 0') );
	curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
	curl_setopt( $ch, CURLOPT_USERPWD, "Mifos:1234");
	curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); 
	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
	$response = curl_exec( $ch );
	curl_getinfo($ch);
	$result = $response;
	echo $result;
	
?>