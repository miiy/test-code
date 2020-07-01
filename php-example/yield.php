<?php

function xrange($start, $end, $step = 1)
{
    for ($i = $start; $i <= $end; $i += $step) {
        yield $i;
    }
}

$range = xrange(1, 1000000);
var_dump($range);
var_dump($range instanceof Iterator);
/*
 * object(Generator)#1 (0) {
 * }
 * bool(true)
 */

die;

foreach (xrange(1, 1000000) as $num) {
    echo $num, "\n";
}
