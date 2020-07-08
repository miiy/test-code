<?php
function gen() {
    yield 'foo';
    yield 'bar';
}
 
$gen = gen();
echo $gen->current();
var_dump($gen->send('something'));
