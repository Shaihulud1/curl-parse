<?php
require_once "CurlClass\Curl.php";
require_once "CurlClass\ArrayUtil.php";
require_once "CurlClass\CaseInsensitiveArray.php";
require_once "CurlClass\MultiCurl.php";
require_once "simple_html_dom.php";
use \Curl\Curl;

function hideMyAss($url,$cookiefile,$pages = 5){
    $curl = new Curl();
    $url = 'http://proxylist.hidemyass.com'; 
    $curl->setOpt(CURLOPT_RETURNTRANSFER, true);
    $curl->setOpt(CURLOPT_FOLLOWLOCATION, true);
    $curl->setOpt(CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.1');
    $curl->setOpt(CURLOPT_COOKIEJAR, $cookiefile);
    $curl->setOpt(CURLOPT_COOKIEFILE, $cookiefile);
    $curl->setOpt(CURLOPT_SSL_VERIFYHOST, false);
    $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false); 
    $result = $curl->get($url);  
    $html = str_get_html($result);
    //<span><style> .K-IH{display:none} .Jcyj{display:inline} </style><span class="Jcyj">218</span><span class="148">.</span><div style="display:none">26</div><span class="K-IH">43</span><span></span><span class="K-IH">44</span><span class="Jcyj">76</span><span style="display:none">95</span><span class="K-IH">95</span><span style="display:none">116</span><div style="display:none">116</div><span style="display:none">192</span><span class="K-IH">192</span><div style="display:none">192</div><span style="display:none">233</span><span></span><span class="167">.</span><span style="display: inline">106</span><span class="148">.</span><span style="display: inline">78</span>        </span>
    if(count($html->find('#listable'))){
        $i = 0;
        foreach($html->find('#listable tbody tr') as $row){
            echo $i;
            $i++;
            echo strip_tags($row);
            echo '</br>';
        }



        // #listable > tbody:nth-child(2) > tr:nth-child(1)
        // #listable > tbody:nth-child(2) > tr:nth-child(1) > td:nth-child(1)
        // $proxy_arr = [];
        // $i=0;
        // foreach($html->find('.hma-table tbody tr') as $row){
        //     // echo $row[0];
        //     $proxy = $row->innertext;
        //     // echo $proxy;
        //     if (preg_match_all('|<span class="updatets">(.+)</span>|isU', $proxy, $arr)){
        //         print_r($proxy);
        //     }

        //     // foreach ($row->find('td') as $td) {
        //     //     $proxy = $td->innertext;  

        //     //     print_r($proxy);
        //     //     echo '</br>';
        //     // }
        // }
    }else{
        $html =  'nope';
        return $html;        
    }
    
}

$cookiefile = $_SERVER['DOCUMENT_ROOT'].'/testparse/cookie.txt';
$url = 'http://proxylist.hidemyass.com';
$hideAss = hidemyass($url,$cookiefile);
echo $hideAss;






