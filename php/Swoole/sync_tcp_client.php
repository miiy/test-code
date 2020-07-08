<?php

// Create the tcp client
$client = new swoole_client(SWOOLE_SOCK_TCP);

// Connect to the tcp server
if (!$client->connect('127.0.0.1', 9501, 0.5)) {
    die("connect failed");
}

// Send data to the tcp server
if (!$client->send("Hello World")) {
    die("send failed");
}

// Receive data from the tcp server
$data = $client->recv();
if (!$data) {
    die("recv failed");
}

// Close the connection
$client->close();