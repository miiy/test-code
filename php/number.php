<?php

/**
 * Word list
 *
 * precision n. 精度
 * round     adj. 圆的
 * floor     n. 地板
 * ceil      v. 装天花板
 */

/**
 * round 对浮点数进行四舍五入
 * @see https://www.php.net/manual/zh/function.round.php
 */
echo "round\n";

echo round(3.4) . " ";                   // 3
echo round(3.5) . " ";                   // 4
echo round(1.95583) . " ";               // 2
echo round(1.95583 . " ", 2);  // 1.96


/**
 * floor 舍去法取整
 * @see https://www.php.net/manual/zh/function.floor.php
 */
echo "\nfloor\n";

echo floor(4.3) . " ";   // 4
echo floor(9.999) . " "; // 9
echo floor(-3.14) . " "; // -4

/**
 * ceil 进一法取整
 * @see https://www.php.net/manual/zh/function.ceil.php
 */
echo "\nceil\n";

echo ceil(4.3) . " ";    // 5
echo ceil(9.999) . " ";  // 10
echo ceil(-3.14) . " ";  // -3

/**
 * intval 获取变量的整数值
 * @see https://www.php.net/manual/zh/function.intval.php
 */
echo "\nintval\n";

echo intval(4.2) . " ";                     // 4
echo intval(042) . " ";                     // 34
echo intval('-42') . " ";                   // -42
echo intval('042') . " ";                   // 42
echo intval(0x1A) . " ";                    // 26
echo intval(array()) . " ";                      // 0
echo intval(array('foo', 'bar')) . " ";          // 1

/**
 * intdiv 对除法结果取整
 * @since 7.0
 * @see https://www.php.net/manual/zh/function.intdiv.php
 */
echo "\nintdiv\n";

echo intdiv(3, 2) . " "; // 1
echo intdiv(-3, 2) . " "; // -1
echo intdiv(0, 1) . " "; // 0
// echo intdiv(1, 0) . " "; // PHP Fatal error:  Uncaught DivisionByZeroError: Division by zero

echo "\n";