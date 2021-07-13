<?php

namespace App\Providers;

use App\Tasks\BusinessTaskPlanning;
use App\Tasks\ItTaskPlanning;
use App\Tasks\TaskPlanning;
use App\ValueObjects\TaskType;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(TaskPlanning::class, function () {
            $type = new TaskType(request()->type);

            if ($type->isBusiness()) {
                $task = new BusinessTaskPlanning($type);
            } elseif ($type->isIt()) {
                $task = new ItTaskPlanning($type);
            } else {
                throw new NotFoundHttpException();
            }

            return $task;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
