<?php

namespace App\Providers;

use App\Tasks\BusinessTaskPlanning;
use App\Tasks\ItTaskPlanning;
use App\Tasks\TaskGateway;
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
        app()->bind(TaskGateway::class, function () {
            if (request()->type == 'it') {
                $task = new ItTaskPlanning(request()->type);
            } elseif (request()->type == 'business') {
                $task = new BusinessTaskPlanning(request()->type);
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
