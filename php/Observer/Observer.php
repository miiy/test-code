<?php

class Observer implements SplObserver
{
    private $subjects = [];

    public function update(SplSubject $subject)
    {
        $this->subjects[] = clone $subject;
    }

    public function getSubjects ()
    {
        return $this->subjects;
    }
}
