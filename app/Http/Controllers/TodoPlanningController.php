<?php

namespace App\Http\Controllers;

use App\Tasks\TaskGateway;

class TodoPlanningController extends Controller
{
    public function index(TaskGateway $taskGateway)
    {
        return response()->json($taskGateway->getComposedTasks());
    }

    public function planning(TaskGateway $taskGateway)
    {
        return response()->json($taskGateway->handle());
    }
}
