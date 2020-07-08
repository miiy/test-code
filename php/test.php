<?php

function swap($x,$y) {
    return ($x > $y) ? $x : $y;
}

$a = 0;
$b = 1;
$c = swap($a++, $b++);
echo "\$a = {$a}\n";
echo "\$b = {$b}\n";
echo "\$c = {$c}\n";

// $a = 1
// $b = 2
// $c = 1