<?php

class A {

    public static function func1()
    {
        echo __METHOD__ . "\n";
    }

    public function func2()
    {
        echo __METHOD__ . "\n";
        self::func3();
    }

    public function func3()
    {
        echo __METHOD__ . "\n";
    }
}

A::func1();

$a = new A();
$a->func1();

$a->func2();