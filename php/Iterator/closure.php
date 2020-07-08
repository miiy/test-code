<?php

function test($a, \Closure $callback = null)
{
    if ($callback instanceof \Closure) {
       return $callback($a);
    }
    return $a;
}

echo test(10);
echo "\n";

echo test(10, function($data){
   return $data * 2;
});
echo "\n";

/**
 * $ php closure.php
 * 10
 * 20
 */

