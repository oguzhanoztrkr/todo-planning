<?php

namespace App\Providers;

use App\Tasks\BusinessTaskPlanning;
use App\Tasks\ItTaskPlanning;
use App\Tasks\TaskPlanning;
use App\ValueObjects\TaskType;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TaskServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(TaskPlanning::class, function () {
            $type = request()->route()->parameter('type');
            $taskType = new TaskType($type);

            if ($taskType->isBusiness()) {
                $task = new BusinessTaskPlanning($taskType);
            } elseif ($taskType->isIt()) {
                $task = new ItTaskPlanning($taskType);
            } else {
                throw new NotFoundHttpException();
            }

            return $task;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
