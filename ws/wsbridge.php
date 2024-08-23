<?php
$api_method = isset($_REQUEST['metodo']) ? $_REQUEST['metodo'] : '';
$provincia = isset($_REQUEST['provincia']) ? $_REQUEST['provincia'] : '';
$comune = isset($_REQUEST['comune']) ? $_REQUEST['comune'] : '';
$indirizzo = isset($_REQUEST['indirizzo']) ? $_REQUEST['indirizzo'] : '';
$particella = isset($_REQUEST['particella']) ? $_REQUEST['particella'] : '';
$civico = isset($_REQUEST['civico']) ? $_REQUEST['civico'] : '';
$indirizzo_like = isset($_REQUEST['indirizzolike']) ? $_REQUEST['indirizzolike'] : '';

$ch = curl_init();
$headers  = [
            'Content-Type: application/json' 
        ];
$postData = [
    'provincia' => $provincia,
    'comune' => $comune,
    'indirizzolike' => trim($indirizzo_like),
    'indirizzo' => trim($indirizzo),
    'particella' => trim($particella),
    'civico' => $civico
];

curl_setopt($ch, CURLOPT_URL,"https://213.243.217.251:8181/".$api_method); 
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));           
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result     = curl_exec ($ch);

// metodo speciale per ordinare i numeri civici, che possono essere composti da lettere e numeri
if($api_method == 'cercacivici'){
    $temp = json_decode($result)->dati; 
    $ordCivici = [];
    $arrCivici = [];
    foreach($temp as $obj){
        $ordCivici[] = $obj->civico_cliente;
    }
    asort($ordCivici, SORT_NATURAL);
    foreach ($ordCivici as $nciv) {
        $arrCivici[] = array('civico_cliente'=>$nciv);
    }
    echo json_encode($arrCivici); die(); 
}
else{
    echo $result;
} 
    
