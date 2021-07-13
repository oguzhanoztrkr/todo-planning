<?php

namespace App\Services;

use App\DataObjects\Dev;
use App\DataObjects\Week;
use App\Models\Task;
use Illuminate\Support\Collection;

class TaskDistribution
{
    /**
     * @var \Illuminate\Support\Collection
     */
    protected $tasks;

    /**
     * @var array
     */
    protected $devList;

    private $maxWorkingTime = 45;

    /**
     * TaskDistribution constructor.
     *
     * @param \Illuminate\Support\Collection|\App\Models\Task[] $tasks
     * @param \Illuminate\Support\Collection|Dev[]              $devList
     */
    public function __construct(Collection $tasks, Collection $devList)
    {
        $this->tasks = $tasks;
        $this->devList = $devList;
    }

    public function handle()
    {
    }

    /**
     * @return \Illuminate\Support\Collection|\App\Models\Task[]
     */
    public function getTasks(): Collection
    {
        return $this->tasks;
    }

    /**
     * @return array
     */
    public function getDevList(): array
    {
        return $this->devList;
    }

    /**
     * @return int
     */
    public function getMaxWorkingTime(): int
    {
        return $this->maxWorkingTime;
    }

    /**
     * @param \App\DataObjects\Week $week
     * @param float                 $timeForJob
     * @return bool
     */
    public function isGetDifferentTask(Week $week, float $timeForJob): bool
    {
        return $this->getMaxWorkingTime() > ($week->totalTime + $timeForJob);
    }

    /**
     * @param \App\DataObjects\Dev $dev
     * @param \App\Models\Task     $task
     * @return bool
     */
    public function canItBeDone(Dev $dev, Task $task): bool
    {
        return $dev->difficulty <= $task->getDifficulty();
    }
}
