<?php

/*
Iterator (迭代器)接口

可在内部迭代自己的外部迭代器或类的接口
*/
class myIterator implements Iterator {
    private $position = 0;
    private $array = array(
        "firstelement",
        "secondelement",
        "lastelement",
    );

    public function __construct()
    {
        $this->position = 0;
    }

    public function rewind()
    {
        var_dump(__METHOD__);
	$this->position = 0;
    }

    function current()
    {
        var_dump(__METHOD__);
	return $this->array[$this->position];
    }

    function key()
    {
        var_dump(__METHOD__);
	return $this->position;
    }

    function next()
    {
        var_dump(__METHOD__);
	return ++$this->position;
    }

    function valid()
    {
        var_dump(__METHOD__);
	return isset($this->array[$this->position]);
    }
}

$it = new myIterator;

foreach($it as $key => $value) {
    var_dump($key, $value);
    echo "\n";
}

/*

string(18) "myIterator::rewind"
string(17) "myIterator::valid"
string(19) "myIterator::current"
string(15) "myIterator::key"
int(0)
string(12) "firstelement"

string(16) "myIterator::next"
string(17) "myIterator::valid"
string(19) "myIterator::current"
string(15) "myIterator::key"
int(1)
string(13) "secondelement"

string(16) "myIterator::next"
string(17) "myIterator::valid"
string(19) "myIterator::current"
string(15) "myIterator::key"
int(2)
string(11) "lastelement"

string(16) "myIterator::next"
string(17) "myIterator::valid"

*/
