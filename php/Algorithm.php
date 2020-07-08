<?php

// 四种基本排序算法

$arr = array(1,43,54,62,21,66,32,78,36,76,39);

function bubbuleSort(array $numbers)
{
    $count = count($numbers);
    if ($count <= 1) return $numbers;

    for($i = 0; $i < $count - 1; $i ++) {
        echo "\$i = {$i}\n";
        for($j = 0; $j < $count - $i - 1; $j ++) {
            echo "\$j = $j ";
            if ($numbers[$j] > $numbers[$j + 1]) {
                $temp = $numbers[$j];
                $numbers[$j] = $numbers[$j + 1];
                $numbers[$j + 1] = $temp;
            }
        }
        echo "\n";
    }
    return $numbers;
}

//print_r(bubbuleSort($arr));
// $i = 0
// $j = 0 $j = 1 $j = 2 $j = 3 $j = 4 $j = 5 $j = 6 $j = 7 $j = 8 $j = 9
// $i = 1
// $j = 0 $j = 1 $j = 2 $j = 3 $j = 4 $j = 5 $j = 6 $j = 7 $j = 8
// $i = 2
// $j = 0 $j = 1 $j = 2 $j = 3 $j = 4 $j = 5 $j = 6 $j = 7
// $i = 3
// $j = 0 $j = 1 $j = 2 $j = 3 $j = 4 $j = 5 $j = 6
// $i = 4
// $j = 0 $j = 1 $j = 2 $j = 3 $j = 4 $j = 5
// $i = 5
// $j = 0 $j = 1 $j = 2 $j = 3 $j = 4
// $i = 6
// $j = 0 $j = 1 $j = 2 $j = 3
// $i = 7
// $j = 0 $j = 1 $j = 2
// $i = 8
// $j = 0 $j = 1
// $i = 9
// $j = 0
// Array
// (
//     [0] => 1
//     [1] => 21
//     [2] => 32
//     [3] => 36
//     [4] => 39
//     [5] => 43
//     [6] => 54
//     [7] => 62
//     [8] => 66
//     [9] => 76
//     [10] => 78
// )


function selectSort(array $numbers)
{
    $count = count($numbers);
    if ($count <= 1) return $numbers;

    for($i = 0; $i < $count - 1; $i++) {
        echo "\$i = {$i}\n";
        $min = $i;

        for ($j = $i + 1; $j < $count; $j++) {
            echo "\$j = $j ";
            if ($numbers[$min] > $numbers[$j]) {
                $min = $j;
            }
        }
        echo "\n";

        if ($min != $i) {
            $temp = $numbers[$min];
            $numbers[$min] = $numbers[$i];
            $numbers[$i] = $temp;
        }
    }
    return $numbers;
}

// print_r(selectSort($arr));
// $i = 0
// $j = 1 $j = 2 $j = 3 $j = 4 $j = 5 $j = 6 $j = 7 $j = 8 $j = 9 $j = 10
// $i = 1
// $j = 2 $j = 3 $j = 4 $j = 5 $j = 6 $j = 7 $j = 8 $j = 9 $j = 10
// $i = 2
// $j = 3 $j = 4 $j = 5 $j = 6 $j = 7 $j = 8 $j = 9 $j = 10
// $i = 3
// $j = 4 $j = 5 $j = 6 $j = 7 $j = 8 $j = 9 $j = 10
// $i = 4
// $j = 5 $j = 6 $j = 7 $j = 8 $j = 9 $j = 10
// $i = 5
// $j = 6 $j = 7 $j = 8 $j = 9 $j = 10
// $i = 6
// $j = 7 $j = 8 $j = 9 $j = 10
// $i = 7
// $j = 8 $j = 9 $j = 10
// $i = 8
// $j = 9 $j = 10
// $i = 9
// $j = 10
// Array
// (
//     [0] => 1
//     [1] => 21
//     [2] => 32
//     [3] => 36
//     [4] => 39
//     [5] => 43
//     [6] => 54
//     [7] => 62
//     [8] => 66
//     [9] => 76
//     [10] => 78
// )

function insertionSort(array $numbers)
{
    $count = count($numbers);
    if ($count <= 1) return $numbers;

    // 先默认下标为0的数已经是有序
    for($i = 1; $i < $count; $i++) {
        echo "\$i = {$i}\n";
        // 准备插入数 跟前一个数比较
        $temp = $numbers[$i];
        for($j = $i - 1; $j >= 0 && $numbers[$j] > $temp; $j--) {
            echo "\$j = $j ";
            $numbers[$j + 1] = $numbers[$j];
        }
        echo "\n";
        echo $j;
        $numbers[$j + 1] = $temp;
    }

    return $numbers;
}

// print_r(insertionSort($arr));
// $i = 1

// $i = 2

// $i = 3

// $i = 4
// $j = 3 $j = 2 $j = 1
// $i = 5

// $i = 6
// $j = 5 $j = 4 $j = 3 $j = 2
// $i = 7

// $i = 8
// $j = 7 $j = 6 $j = 5 $j = 4 $j = 3
// $i = 9
// $j = 8
// $i = 10
// $j = 9 $j = 8 $j = 7 $j = 6 $j = 5 $j = 4
// Array
// (
//     [0] => 1
//     [1] => 21
//     [2] => 32
//     [3] => 36
//     [4] => 39
//     [5] => 43
//     [6] => 54
//     [7] => 62
//     [8] => 66
//     [9] => 76
//     [10] => 78
// )

function quickSort(array $numbers)
{
    $count = count($numbers);
    if ($count <= 1) return $numbers;

    $left = array();
    $right = array();
    $mid_value = $numbers[0];

    for ($i = 1; $i < $count; $i++) {
        echo "\$i = $i ";
        if ($numbers[$i] < $mid_value) {
            $left[] = $numbers[$i];
        } else {
            $right[] = $numbers[$i];
        }
    }
    echo "\n";
    return array_merge(quickSort($left), (array) $mid_value, quickSort($right));
}

// print_r(quickSort($arr));
// $i = 1 $i = 2 $i = 3 $i = 4 $i = 5 $i = 6 $i = 7 $i = 8 $i = 9 $i = 10
// $i = 1 $i = 2 $i = 3 $i = 4 $i = 5 $i = 6 $i = 7 $i = 8 $i = 9
// $i = 1 $i = 2 $i = 3
// $i = 1 $i = 2
// $i = 1
// $i = 1 $i = 2 $i = 3 $i = 4
// $i = 1 $i = 2 $i = 3
// $i = 1 $i = 2
// $i = 1
// Array
// (
//     [0] => 1
//     [1] => 21
//     [2] => 32
//     [3] => 36
//     [4] => 39
//     [5] => 43
//     [6] => 54
//     [7] => 62
//     [8] => 66
//     [9] => 76
//     [10] => 78
// )
