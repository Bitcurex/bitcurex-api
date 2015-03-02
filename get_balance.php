<?php

$main_api_url = 'https://api.bitcurex.com/';
$api_user_id = '';
$api_key = '';
$api_secret = '';

function getBalance($url){
    $ch = curl_init();

    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
    $output = curl_exec($ch);
 
    curl_close($ch);
    return $output;
}

$url = $main_api_url.'balance/'.$api_user_id.'/'.$api_key.'/'.$api_secret.'/';

var_dump(
    json_decode(
        getBalance($url)
    )
);

?>
