<?php

namespace App\DataObjects;

class Dev
{
    public $title;

    public $difficulty;

    /**
     * @var \Illuminate\Support\Collection|\App\DataObjects\Week[]
     */
    public $weeks;

    public function __construct($title, $difficulty)
    {
        $this->title = $title;
        $this->difficulty = $difficulty;
    }
}
