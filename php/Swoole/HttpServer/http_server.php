<?php
/**
 * Run program
 * php http_server.php
 *
 * Test
 * curl http://127.0.0.1:9501
 */

use Swoole\Http\Server;
use Swoole\Http\Request;
use Swoole\Http\Response;

// Create the http server object
$http_server = new Server("0.0.0.0", 9503);

// Register the event of request
$http_server->on('request', function(Request $request, Response $response){
    var_dump($request->get, $request->post);
    $response->header('Content-Type', "text/html;charset=utf-8");
    $response->end("<h1>Hello Swoole" . rand(1000, 9999) . "</h1>");
});

// Start the server
$http_server->start();