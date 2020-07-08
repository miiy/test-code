<?php
/**
 * Run program
 * php async_task.php
 *
 * Test
 * telnet 127.0.0.1
 *
 * Result
 * Dispatch async task: id = 0
 * Receive new task, id: 0
 * Async task 0 result: a
 *  -> finished
 * Dispatch async task: id = 1
 * Receive new task, id: 1
 * Async task 1 result: b
 *  -> finished
 */
// Create the server object and listen 127.0.0.1:9501 port
$server = new swoole_server("127.0.0.1", 9501);

// Set the number of task worker process
$server->set([
    'task_worker_num' => 4
]);

// Register the function for the event of receiving
$server->on('receive', function ($server, $fd, $from_id, $data) {

    // Send data to the task worker process
    $task_id = $server->task($data);
    echo "Dispatch async task: id = {$task_id}\n";

    // Send data to the client
    $server->send($fd, "Server:" . $data);
});

// Register the function for the event of receiving task
$server->on('task', function ($server, $task_id, $from_id, $data) {
    echo "Receive new task, id: {$task_id}\n";

    // Return the result of executing task
    $server->finish("{$data} -> finished");
});

// Register the function for the event of receiving task result
$server->on('finish', function ($server, $task_id, $data) {
    // Handle the result of executing task
    echo "Async task {$task_id} result: {$data}\n";
});

// Start the server
$server->start();
