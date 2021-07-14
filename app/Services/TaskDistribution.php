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
     * @var \Illuminate\Support\Collection
     */
    protected $devList;

    private $maxWorkingTime = 45;

    public function handle(): Collection
    {
        $this->prepare();

        $this->distributeTasks($this->tasks);

        $this->optimizeDevList();

        return $this->devList;
    }

    public function optimizeDevList()
    {
        $this->devList->each(function (Dev $dev) {
            $dev->weeks = $dev->weeks->reject(function (Week $week) use ($dev) {
                return $week->totalTime === 0;
            });
        });
    }

    /**
     * @param \App\DataObjects\Dev $dev
     * @param \App\Models\Task     $task
     * @param float                $timeForTask
     * @return void
     */
    public function addTaskToDev(Dev $dev, Task $task, float $timeForTask): void
    {
        $week = $dev->weeks->last();
        $week->tasks[] = $task->toArray();
        $week->totalTime += $timeForTask;
    }

    public function createWeek(Dev $dev)
    {
        if (! $dev->weeks) {
            $dev->weeks = collect([]);
        }

        $dev->weeks->push(new Week);
    }

    /**
     * @param Collection|\App\Models\Task[] $tasks
     */
    public function distributeTasks($tasks)
    {
        $assignedJobCount = 0;
        foreach ($tasks as $key => $task) {
            foreach ($this->devList as $dev) {
                if (! $this->canItBeDone($dev, $task) || $task->assigned) {
                    continue;
                }

                $activeWeekIndex = count($dev->weeks) - 1;

                if ($dev->weeks[$activeWeekIndex]->totalTime == $this->getMaxWorkingTime()) {
                    $activeWeekIndex++;
                    $this->createWeek($dev);
                }

                $week = $dev->weeks[$activeWeekIndex];
                $timeForTask = $task->getTime() / $dev->difficulty * $task->getDifficulty();

                if (! $this->canGetDifferentTask($week, $timeForTask)) {
                    continue;
                }

                $task->assigned = true;
                $task->time_for_dev = $timeForTask;
                $this->addTaskToDev($dev, $task, $timeForTask);
                $assignedJobCount++;
            }
        }

        /**
         * @var \Illuminate\Support\Collection $tasks
         */

        $tasksNotAssigned = $tasks->filter(function (Task $item) {
            if (! $item->assigned) {
                return $item;
            }
        });

        if (! $assignedJobCount) {
            $this->createNewWeekForAllDeveloper();
        }

        if ($tasksNotAssigned->count()) {
            $this->distributeTasks($tasksNotAssigned);
        }
    }

    public function prepare()
    {
        /*
         * initialize first weeks for all developer
         */
        $this->createNewWeekForAllDeveloper();
    }

    public function createNewWeekForAllDeveloper()
    {
        foreach ($this->devList as $dev) {
            $this->createWeek($dev);
        }
    }

    /**
     * @return \Illuminate\Support\Collection|\App\Models\Task[]
     */
    public function getTasks(): Collection
    {
        return $this->tasks;
    }

    /**
     * @param \Illuminate\Support\Collection $tasks
     * @return TaskDistribution
     */
    public function setTasks(Collection $tasks): TaskDistribution
    {
        $this->tasks = $tasks;

        return $this;
    }

    public function getDevList(): Collection
    {
        return $this->devList;
    }

    /**
     * @param \Illuminate\Support\Collection $devList
     * @return TaskDistribution
     */
    public function setDevList(Collection $devList): TaskDistribution
    {
        $this->devList = $devList;

        return $this;
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
    public function canGetDifferentTask(Week $week, float $timeForJob): bool
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
        return $dev->difficulty >= $task->getDifficulty();
    }
}
