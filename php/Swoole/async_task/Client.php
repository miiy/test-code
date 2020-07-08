<?php

use Swoole\Client as SwooleClient;

class Client
{
    private $client;

    public function __construct()
    {
        $this->client = new SwooleClient(SWOOLE_SOCK_TCP);
    }

    public function connect()
    {
        if ($this->client->connect("127.0.0.1", 9501, 1)) {
            echo "Connect Error.";
        }
    }

    public function send()
    {
        $data = [
            "type" => "mail",
            "data" => [
                "address" => "test@test.com",
                "object" => "object",
                "content" => "content"
            ]
        ];
        $jsonData = json_encode($data);
        $this->client->send($jsonData);
    }
}

$client = new Client();
$client->connect();