<?php
require_once "CurlClass\Curl.php";
require_once "CurlClass\ArrayUtil.php";
require_once "CurlClass\CaseInsensitiveArray.php";
require_once "CurlClass\MultiCurl.php";
use \Curl\Curl;
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
$post = [
            'op' => 'login-main',
            'dest' => '/',
            'user' => 'swaroghh',
            'passwd' => 'mahersxx1488',
            'api_type' => 'json'
        ];
$cookiefile = $_SERVER['DOCUMENT_ROOT'].'/testparse/cookie.txt';
$html = makeCurl('https://www.reddit.com/post/login',$cookiefiles,$post);
print_r($html);





