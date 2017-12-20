<?php

$params = [
    'lang' => 'ru',
    'account' => array(
        'login' => 'login',
        'password' => 'pass'
    )
];

$url_query = 'http://client-api.instaforex.com/soapservices/Calendar.svc?wsdl'.http_build_query($params);
$curl_handle=curl_init();
curl_setopt($curl_handle, CURLOPT_URL, $url_query);
curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
$query = curl_exec($curl_handle);
print_r($query);

// require_once('lib/nusoap.php');

// $client = new soapclient('http://client-api.instaforex.com/soapservices/Calendar.svc?wsdl', true);

// if ($err = $client->getError())
// echo $err;

// $parameters = array(
//     'lang' => 'ru',
//     'account' => array(
//     'login' => 'login',
//     'password' => 'pass'
//  )
// );

// $result = $client->call('GetCalendar', $parameters);

// if ($client->fault) {
//     echo 'Error';
//     print_r($result);
// }
// else {
//     if ($err = $client->getError()) {
//         echo $err;
//     }
//     else{
//         echo 'Result - ';
//         print_r($result);
//     }
// }