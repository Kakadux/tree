<?php

$user = 'pescagis_user';
$t = 'f0fac263139cbec6c8bc5cfcf757c0ae';
$token = md5(date('Ymd').$t.date('dmY'));


$service_url = 'https://internalws.nacc.go.th/api/v1/pesca/pescagis';
$curl = curl_init($service_url);
$curl_post_data = array(
      'user' => $user,
      'token' => $token,
      'page' => '1',

);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);

curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);

$curl_response = curl_exec($curl);
curl_close($curl);  
$decoded = json_decode($curl_response);   

echo print_r($decoded)."<br>";

?>