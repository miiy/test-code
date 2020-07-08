<?php

use Swoole\Server as SwooleServer;

class Server
{
    protected $server;

    public function __construct()
    {
        $this->server = new SwooleServer('0.0.0.0', 9501);
        $this->server->set([
            'worker_num' => 2, // 一般设置为服务器CPU数的1-4倍
            'daemonize' => 1, // 以守护进程执行
        ]);
        $this->server->on('Receive', [$this, 'onReceive']);
        $this->server->on('Task', [$this, 'onTask']);
        $this->server->on('Finish', [$this, 'onFinish']);
        $this->server->start();
    }

    public function onReceive(SwooleServer $server, $fd, $reactorId, $data)
    {
        echo "Get message from client {$fd}:{$data}\n";
        // Send a task to task worker.
        $this->server->task($data);
    }

    public function onTask(SwooleServer $server, $taskId, $srcWorkerId, $data)
    {
        $this->handleTask(json_decode($data));
    }

    public function onFinish(SwooleServer $server, $taskId, $data)
    {
        echo "Task {$taskId} finish.\n";
        echo "Result: {$data}\n";
    }

    protected function handleTask(array $data)
    {
        if ($data['type'] == "mail") {
            echo "mail is send.";
        }
    }
}