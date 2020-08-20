<?php
/**
 * @see http://docs.guzzlephp.org/en/stable/quickstart.html#async-requests
 */
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Promise;

$startTime = time();

$client = new Client();
$promises = [
    'baidu' => $client->getAsync("https://www.baidu.com"),
    'sina' => $client->getAsync("https://www.sina.com"),
    'taobao' => $client->getAsync("https://www.taobao.com"),
];
$responses = Promise\unwrap($promises);

var_dump(time() - $startTime);
var_dump($responses['baidu']->getBody()->getContents());
var_dump($responses['sina']->getBody()->getContents());
var_dump($responses['taobao']->getBody()->getContents());