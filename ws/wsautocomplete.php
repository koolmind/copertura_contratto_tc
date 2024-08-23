<?php
$provincia = isset($_REQUEST['provincia']) ? $_REQUEST['provincia'] : '';
$comune = isset($_REQUEST['comune']) ? $_REQUEST['comune'] : '';
$indirizzo_like = isset($_REQUEST['indirizzolike']) ? $_REQUEST['indirizzolike'] : '';

$ch = curl_init();
$headers  = [
            'Content-Type: application/json'
        ];
$postData = [
    'provincia' => $provincia,
    'comune' => $comune,
    'indirizzolike' => trim($indirizzo_like)];

curl_setopt($ch, CURLOPT_URL,"https://213.243.217.251:8181/cercaindirizzi"); 
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));           
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result     = curl_exec ($ch);
//$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

$temp = json_decode($result);
echo json_encode($temp->dati);
