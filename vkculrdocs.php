<?php
require_once "CurlClass\Curl.php";
require_once "CurlClass\ArrayUtil.php";
require_once "CurlClass\CaseInsensitiveArray.php";
require_once "CurlClass\MultiCurl.php";
use \Curl\Curl;
function makeCurl($url,$cookiefile){
    $curl = new Curl();
    $curl->setOpt(CURLOPT_RETURNTRANSFER, true);
    $curl->setOpt(CURLOPT_FOLLOWLOCATION, true);
    $curl->setOpt(CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.1');
    $curl->setOpt(CURLOPT_COOKIEJAR, $cookiefile);
    $curl->setOpt(CURLOPT_COOKIEFILE, $cookiefile);
    $curl->setOpt(CURLOPT_SSL_VERIFYHOST, false);
    $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
    return $result;
    print_r($result);

}
function getdoclink($url){
    //$url = "https://nordvpn.com/wp-admin/admin-ajax.php?searchParameters[0][name]=proxy-country&searchParameters[0][value]=&searchParameters[1][name]=proxy-ports&searchParameters[1][value]=&offset=0&limit=200&action=getProxies";
    $curl = new Curl();
    $curl->setOpt(CURLOPT_RETURNTRANSFER, true);
    $curl->setOpt(CURLOPT_FOLLOWLOCATION, true); 
    $curl->setOpt(CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.1'); 
    $curl->setOpt(CURLOPT_SSL_VERIFYHOST, false);
    $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);  
    $result = $curl->get($url);  
    // $result = json_encode($result);
    // $result = json_decode($result,true); 
    // $result = json_decode($result); 
    return $result;  
}
function getdocurl($url){
    $ch = curl_init();  
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $result = curl_exec($ch);
    return $result; 
}


$doc = getdocurl('https://vk.com/doc254281493_446889846');
print_r($doc);



// $post = [
//             'op' => 'login-main',
//             'dest' => '/',
//             'user' => 'swaroghh',
//             'passwd' => 'mahersxx1488',
//             'api_type' => 'json'
//         ];
// $cookiefile = $_SERVER['DOCUMENT_ROOT'].'/testparse/cookie.txt';

// $html = makeCurl('https://vk.com/doc254281493_446889846',$cookiefiles);
// print_r($html);





