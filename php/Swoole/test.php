<?php

$buffer = new \Swoole\Buffer();
$buffer->append(str_repeat('A', 10));
$buffer->append(str_repeat('B', 10));
$buffer->append(str_repeat('C', 10));
var_dump($buffer->read(0,-1));