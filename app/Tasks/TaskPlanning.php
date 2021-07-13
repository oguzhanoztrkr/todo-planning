<?php

namespace App\Tasks;

use App\Services\TaskDistribution;
use App\ValueObjects\TaskType;
use Illuminate\Support\Collection;

abstract class TaskPlanning
{
    private $type;

    abstract public function getComposedTasks(): Collection;

    abstract public function factoryMethod(): TaskPlanning;

    abstract public function getTasks(): Collection;

    public function __construct(TaskType $type)
    {
        $this->type = $type;
    }

    public function handle()
    {
        $tasks = $this->getTasks();
        $devList = (new Developers())->all();

        return (new TaskDistribution($tasks, $devList))->handle();
    }

    /**
     * @return \App\ValueObjects\TaskType
     */
    public function getType(): TaskType
    {
        return $this->type;
    }
}
