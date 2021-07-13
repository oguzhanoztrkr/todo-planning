<?php

namespace App\DataObjects;

class Week
{
    public $jobs = [];

    public $totalTime = 0;

    public function __construct(array $jobs = [], $totalTime = 0) {
        $this->jobs = $jobs;
        $this->totalTime = $totalTime;
    }
}
