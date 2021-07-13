<?php

namespace App\Http\Controllers;

use App\DataObjects\Dev;
use App\Tasks\TaskPlanning;

class TodoPlanningController extends Controller
{
    public function index(TaskPlanning $taskGateway)
    {
        return response()->json($taskGateway->getComposedTasks());
    }

    public function planning(TaskPlanning $taskGateway)
    {
        $taskPlan = $taskGateway->handle();

        $maxWeek = $taskPlan->max(function (Dev $dev) {
            return $dev->weeks->count();
        });

        return response()->json([
            'plan'     => $taskPlan->toArray(),
            'max_week' => $maxWeek
        ]);
    }
}
