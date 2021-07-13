<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class TaskDistribution extends Facade
{
    protected static function getFacadeAccessor() { return 'task.distribution'; }
}
