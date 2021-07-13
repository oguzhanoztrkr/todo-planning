<?php

namespace App\DataObjects;

class Week
{
    public $tasks = [];

    public $totalTime = 0;

    public function __construct(array $tasks = [], $totalTime = 0) {
        $this->tasks = $tasks;
        $this->totalTime = $totalTime;
    }
}
