<?php
require_once "CurlClass\Curl.php";
require_once "CurlClass\ArrayUtil.php";
require_once "CurlClass\CaseInsensitiveArray.php";
require_once "CurlClass\MultiCurl.php";
use \Curl\Curl;
https://nordvpn.com/wp-admin/admin-ajax.php?searchParameters[0][name]=proxy-country&searchParameters[0][value]=&searchParameters[1][name]=proxy-ports&searchParameters[1][value]=&offset=0&limit=200&action=getProxies
function makeCurl($url,$cookiefile,$postdata){
    $curl = new Curl();
    $curl->setOpt(CURLOPT_RETURNTRANSFER, true);
    $curl->setOpt(CURLOPT_FOLLOWLOCATION, true);
    $curl->setOpt(CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.1');
    $curl->setOpt(CURLOPT_COOKIEJAR, $cookiefile);
    $curl->setOpt(CURLOPT_COOKIEFILE, $cookiefile);
    $curl->setOpt(CURLOPT_SSL_VERIFYHOST, false);
    $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
    if($postdata){
        $result = $curl->post($url, $postdata);
    }
    return $result;

}
function getSaveProxies($count,$cookiefile,$jsonfile, $offset = 0){
    $url = "https://nordvpn.com/wp-admin/admin-ajax.php?searchParameters[0][name]=proxy-country&searchParameters[0][value]=&searchParameters[1][name]=proxy-ports&searchParameters[1][value]=&offset=".$offset."&limit=".$count."&action=getProxies";
    //$url = "https://nordvpn.com/wp-admin/admin-ajax.php?searchParameters[0][name]=proxy-country&searchParameters[0][value]=&searchParameters[1][name]=proxy-ports&searchParameters[1][value]=&offset=0&limit=200&action=getProxies";
    $curl = new Curl();
    $curl->setOpt(CURLOPT_RETURNTRANSFER, true);
    $curl->setOpt(CURLOPT_FOLLOWLOCATION, true); 
    $curl->setOpt(CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.1');
    $curl->setOpt(CURLOPT_COOKIEJAR, $cookiefile);
    $curl->setOpt(CURLOPT_COOKIEFILE, $cookiefile);   
    $curl->setOpt(CURLOPT_SSL_VERIFYHOST, false);
    $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);  
    $result = $curl->get($url);  
    $result = json_encode($result);
    $file = file_put_contents($jsonfile, $result);
    $result = json_decode($result,true); 
    // $result = json_decode($result); 
    return $result;  
}
// $cookiefile = $_SERVER['DOCUMENT_ROOT'].'/testparse/cookie2.txt';
// $jsonfile = $_SERVER['DOCUMENT_ROOT'].'/testparse/proxies.json';
// $proxies = getSaveProxies(10,$cookiefile,$jsonfile);
// // print_r($proxies);
// // foreach ($proxies as $proxy) {
//     $curl = new Curl();
//     $curl->setOpt(CURLOPT_RETURNTRANSFER, true);
//     $curl->setOpt(CURLOPT_FOLLOWLOCATION, true); 
//     $curl->setOpt(CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.1');
//     $curl->setOpt(CURLOPT_COOKIEJAR, $cookiefile);
//     $curl->setOpt(CURLOPT_COOKIEFILE, $cookiefile);   
//     $curl->setOpt(CURLOPT_SSL_VERIFYHOST, false);
//     $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false); 
//     //proxy here     
//     // $curl->setOpt(CURLOPT_PROXY, $proxy['id'].':'.$proxy['port']);
//     // $curl->setOpt(CURLOPT_PROXYTYPE, CURLPROXY_.$proxy['type']);
//     $curl->setOpt(CURLOPT_PROXY, "173.212.207.64:3128");
//     $curl->setOpt(CURLOPT_PROXYTYPE, CURLPROXY_HTTP);    
//     //time
//     $curl->setOpt(CURLOPT_TIMEOUT,16);
//     $curl->setOpt(CURLOPT_CONNECTTIMEOUT,12);


//     $curl->get('https://httpbin.org/get');
//     var_dump($curl->response);   
// }
use \Curl\MultiCurl;
$cookiefile = $_SERVER['DOCUMENT_ROOT'].'/testparse/cookieProxy.txt';
function MultiProxyCurl($url, $proxy_arr,$cookiefile){
    
    // print_r($proxies);
    // foreach ($proxies as $proxy) {


    $curl = new MultiCurl();
    $curl->setOpt(CURLOPT_RETURNTRANSFER, true);
    $curl->setOpt(CURLOPT_FOLLOWLOCATION, true); 
    $curl->setOpt(CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.1');
    $curl->setOpt(CURLOPT_COOKIEJAR, $cookiefile);
    $curl->setOpt(CURLOPT_COOKIEFILE, $cookiefile);   
    $curl->setOpt(CURLOPT_SSL_VERIFYHOST, false);
    $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);     
    //time
    $curl->setOpt(CURLOPT_TIMEOUT,16);
    $curl->setOpt(CURLOPT_CONNECTTIMEOUT,12);
        $curl->setOpt(CURLOPT_PROXY, $proxy_arr[0]);
        $curl->setOpt(CURLOPT_PROXYTYPE, CURLPROXY_HTTP);        
        $curl->addGet($url);    
    $curl->start();
    // $curl->get($url);
    // var_dump($curl->response); 
    $curl->success(function($instance) {
        echo 'call to "' . $instance->url . '" was successful.' . "\n";
        echo 'response:' . "\n";
        var_dump($instance->response);
    });
    $curl->error(function($instance) {
        echo 'call to "' . $instance->url . '" was unsuccessful.' . "\n";
        echo 'error code: ' . $instance->errorCode . "\n";
        echo 'error message: ' . $instance->errorMessage . "\n";
    });
    $curl->complete(function($instance) {
        echo 'call completed' . "\n";
    }); 
    return $curl;     
  
}
$proxy_arr = file_get_contents('proxies.txt');
$proxy_arr = explode(PHP_EOL, $proxy_arr);
$multi_curl=MultiProxyCurl('https://httpbin.org/ip',$proxy,$cookiefile); 
print_r($multi_curl);   










