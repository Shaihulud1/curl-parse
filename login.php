<?php
require_once "php-curl-class-master\php-curl-class-master\src\Curl\Curl.php";
$cookiefiles = $_SERVER['DOCUMENT_ROOT'].'/testparse/cookie.txt';
function request($url, $postdata = null, $cookiefile){
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.1');
    //cookies
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiefile);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiefile);
    //ssl options
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);      

    if($postdata){
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
    } 

    $result = curl_exec($ch);
    return $result;
}

file_put_contents('cookie.txt','');

// $html = request('https://yandex.ru');

$post = [
            'op' => 'login-main',
            'dest' => '/',
            'user' => 'swaroghh',
            'passwd' => 'mahersxx1488',
            'api_type' => 'json'
        ];
print_r($post);
$html = request('https://www.reddit.com/post/login', $post,$cookiefiles);
print_r($html);
