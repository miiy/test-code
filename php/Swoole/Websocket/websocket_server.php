<?php
/**
 * Run program
 * php websocket_server.php
 *
 */

// Create the websocket server object
$websocket_server = new swoole_websocket_server("0.0.0.0", 9502);

// Register function of the opening connection event
$websocket_server->on('open', function($websocket_server, $request){
    var_dump($request->fd, $request->get, $request->server);
    $websocket_server->push($request->fd, "Hello welcome\n");
});

// Register function of the receiving message event
$websocket_server->on('message', function($websocket_server, $frame){
    echo "Message:{$frame->data}\n";
    $websocket_server->push($frame->fd, "Server:{$frame->data}");
});

// Register function of the close event
$websocket_server->on('close', function($websocket_server, $fd){
    echo "Client_{$fd} is closed\n";
});

// Start the server
$websocket_server->start();