<?php

namespace App\Tasks;

use App\Models\Task;
use App\Services\TaskDistribution;

abstract class TaskGateway
{
    protected $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function handle()
    {
        $tasks = $this->getTasks();
        $devList = (new Developers)->all();

        return (new TaskDistribution($tasks, $devList))->handle();
    }

    public function getTasks()
    {
        return Task::all();
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }
}
