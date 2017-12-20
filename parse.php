<?php
require_once 'phpQuery/phpQuery.php';

$cookiefile = 'http://testall.os:83/testparse/cookie.txt';
$ch = curl_init('http://pogoda.yandex.ru');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiefile);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiefile);

$result = curl_exec($ch);

curl_close($ch);
echo $result;


$html = file_get_contents('http://pogoda.yandex.ru');

phpQuery::newDocument($html);

$title = pq('title')->html();

echo $title;

phpQuery::unloadDocuments();
?>