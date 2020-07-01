<?php
/*
 * Traversable（遍历）接口
 *
 * 简介
 * 检测一个类是否可以使用foreach进行遍历的接口
 * 无法被单独实现的基本抽象接口。相反它必须由 IteratorAggregate 或 Iterator 接口实现。
 *
 * Note:
 * 实现此接口的内建类可以使用 foreach 进行遍历而无需实现 IteratorAggregate 或 Iterator 接口。
 *
 * Note:
 * 这是一个无法在 PHP 脚本中实现的内部引擎接口。IteratorAggregate 或 Iterator 接口可以用来代替它。
 *
 * 接口摘要
 * Traversable {
 * }
 *
 * 这个接口没有任何方法，它的作用仅仅是作为所有可遍历类的基本接口。
 *
 */


$items = "string";

if( !is_array( $items ) && !$items instanceof Traversable ) {
    echo "items is NOT array Not Traversable\n";
}

$myarray = array('one', 'two', 'three');

$myobj = (object) $myarray;

var_dump($myarray);

var_dump($myobj);

if (!($myarray instanceof \Traversable)) {
    print "myarray is NOT Traversable\n";
}

if (!($myobj instanceof \Traversable)) {
    print "myobj is NOT Traversabl\n";
}

foreach($myarray as $value) {
    print $value . "\n";
}

foreach($myobj as $value) {
    print $value . "\n";
}

/*
 * $ php Traversable.php
 * array(3) {
 *   [0]=>
 *   string(3) "one"
 *   [1]=>
 *   string(3) "two"
 *   [2]=>
 *   string(5) "three"
 * }
 * object(stdClass)#1 (3) {
 *   ["0"]=>
 *   string(3) "one"
 *   ["1"]=>
 *   string(3) "two"
 *   ["2"]=>
 *   string(5) "three"
 * }
 * myarray is NOT Traversable
 * myobj is NOT Traversabl
 * one
 * two
 * three
 * one
 * two
 * three
 */

