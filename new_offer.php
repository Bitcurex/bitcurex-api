<?php

$main_api_url = 'https://api.bitcurex.com/';
$market = ''; //example: 'pln' or 'eur' 
$api_user_id = '';
$api_key = '';
$api_secret = '';
$limit = ''; // example: '1900'
$volume = ''; // example: '0.003'
$offer_type = ''; // example: 'ask'


function putOffer($url, $params){
    $data_string = json_encode($params); 

    $ch = curl_init();  

    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($data_string)
        )
    );
 
    $output = curl_exec($ch);
 
    curl_close($ch);
    return $output;
}

$url = $main_api_url.'offer/'.$market.'/'.$api_user_id.'/'.$api_key;
$params = array(
    'limit' => $limit,
    'volume' => $volume,
    'offer_type' => $offer_type,
    'api_secret' => $api_secret
);

var_dump(
    json_decode(
        putOffer($url, $params)
    )
);

?>
