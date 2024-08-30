<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://open-weather13.p.rapidapi.com/city/landon/EN",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: open-weather13.p.rapidapi.com",
		"x-rapidapi-key: 480371c6d8msh805be9726ae5068p1c8163jsn08321a8982eb"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}