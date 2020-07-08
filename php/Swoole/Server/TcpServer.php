<?php

use Swoole\Server;

$server = new Server('0.0.0.0', 9501, SWOOLE_BASE, SWOOLE_SOCK_TCP);

// 设置运行时参数
$server->set([
    'worker_num' => 4,
    'daemonize' => true,
    'backlog' => 128
]);

// 注册事件回调函数
$server->on('Connect', 'my_onConnect');
$server->on('Receive', 'my_onReceive');
$server->on('Close', 'my_onClose');

// 启动服务器
$server->start();

// 属性列表

// 管理进程的PID，通过向管理进程发送SIGUSR1信号可实现柔性重启
$server->manager_pid;
// 主进程的PID，通过向主进程发送SIGTERM信号可安全关闭服务器
$server->master_pid;
// 当前服务器的客户端连接，可使用Fforeach便利
$server->connections;