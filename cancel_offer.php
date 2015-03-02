<?php

$main_api_url = 'https://api.bitcurex.com/';
$api_user_id = '';
$api_key = '';
$api_secret = '';
$offer_id = ''; // example: '2014/09/10/6545/2292';


function delOffer($url, $params){
    $data_string = json_encode($params); 

    $ch = curl_init();  

    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($data_string)
        )
    );
 
    $output = curl_exec($ch);
 
    curl_close($ch);
    return $output;
}

$url = $main_api_url.'offer/del/'.$api_user_id.'/'.$api_key;
$params = array(
    'offer_id' => $offer_id,
    'api_secret' => $api_secret
);

var_dump(
    json_decode(
        delOffer($url, $params)
    )
);

?>
