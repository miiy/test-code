<?php

$client = new \Swoole\Client(SWOOLE_SOCK_UDP);
$client->connect('127.0.0.1', 9503, 1);
$i=1;
while ($i < 3) {
    $client->send($i. "\n");
    $message = $client->recv();
    echo "Get message from serv:{$message}";
    $i++;
}

