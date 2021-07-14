<?php

namespace Tests\Unit;

use App\DataObjects\Dev;
use App\DataObjects\Week;
use App\Models\Task;
use App\Services\TaskDistribution as TaskDistributionService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskDistributionTest extends TestCase
{
    use RefreshDatabase;

    protected $devs;

    public function testCanItBeDone()
    {
        $task = Task::where('difficulty', 5)->first();
        $distribution = new TaskDistributionService(collect($task), $this->devs);
        $result = $distribution->canItBeDone($this->devs->first(), $task);
        $this->assertTrue($result);
    }

    public function testCanGetDifferentTask()
    {
        $task = Task::where('difficulty', 3)->first();
        $distribution = new TaskDistributionService(collect($task), $this->devs);

        $week = new Week([], 40);

        $result = $distribution->canGetDifferentTask($week, $task->getTime());
        $this->assertFalse($result);
    }

    public function testDifficultyOkButWeekIsFull()
    {
        $task = Task::where('difficulty', 5)->first();
        $distribution = new TaskDistributionService(collect($task), $this->devs);

        $week = new Week([], 45);

        $result = $distribution->canGetDifferentTask($week, $task->getTime());
        $this->assertFalse($result);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed();

        $this->devs = collect([
            new Dev('Dev5', 5),
            new Dev('Dev4', 4),
            new Dev('Dev3', 3),
            new Dev('Dev2', 2),
            new Dev('Dev1', 1),
        ]);
    }
}
