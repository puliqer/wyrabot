<?php

error_reporting(0);

function js($array,$j = 0) {
	return json_encode($array, $j);
}
function jd($array,$j = 0) {
	return json_decode($array, $j);
}

$token = '';
define('API_KEY', $token);

function bot($method, $data=[], $token = API_KEY) {
	$ch = curl_init('https://api.telegram.org/bot'.$token.'/'.$method);
	curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => 1, CURLOPT_POSTFIELDS => $data]);
	return jd(curl_exec($ch));
}






?>