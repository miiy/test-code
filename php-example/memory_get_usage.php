<?php

$start = memory_get_usage();

echo "start: {$start} byte.\n";

$arr = [];
for ($i = 0; $i < 100; $i++) {
    array_push($arr, rand(0,10000));
}

$end = memory_get_usage();
echo "end: {$end} byte.\n";

$usage = ($end - $start);
echo "usage: {$usage} byte.\n";

/*
 * $ php memory_get_usage.php
 * start: 393176 byte.
 * end: 401480 byte.
 * usage: 8304 byte.
 */

