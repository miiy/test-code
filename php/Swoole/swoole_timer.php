<?php
/**
 * Run program
 * php swoole_timer.php
 */

// Executes the setted function repeatedly, with a fixed time dalay between each call
swoole_timer_tick(2000, function ($timer_id) {
    echo "tick 2000ms\n";
});

// Executes the setted function after specified delay
swoole_timer_after(3000, function () {
    echo "after 3000ms\n";
});