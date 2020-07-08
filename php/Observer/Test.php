<?php

require_once 'Observer.php';
require_once 'Subject.php';

$subject = new Subject();
$observer = new Observer();
$subject->attach($observer);
$subject->change();
$subject->change();
$result = $observer->getSubjects();
var_dump($result);
