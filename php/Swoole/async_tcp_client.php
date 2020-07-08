<?php

// Create the asynchronous tcp client object
$client = new swoole_client(SWOOLE_SOCK_TCP, SWOOLE_SOCK_ASYNC);

// Register the function for the event `connect`
$client->on("connect", function ($client) {
    $client->send("Hello World");
});

// Register the function for the event `receive`
$client->on("receive", function ($client, $data) {
    echo "Receive:" . $data . "\n";
});


// Register the function for the event `error`
$client->on("error", function () {
    echo "Connect failed";
});

// Register the function for the event `close`
$client->on("close", function ($client) {
    echo "Connection close\n";
});

// Start to connect to the server
$client->connect("127.0.0.1", 9501, 0.5);