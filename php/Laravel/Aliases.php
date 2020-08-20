<?php

namespace Framework;

class App {
    public function __construct()
    {
        echo "init\n";
    }
}

class_alias('\Framework\App', 'App');

namespace Index;
use \App;

$app = new App();
var_dump($app);




