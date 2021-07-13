<?php

namespace App\Tasks;

use App\Models\Task;
use Illuminate\Support\Collection;

class ItTaskPlanning extends TaskGateway
{
    public function getTasks()
    {
        $tasks = Task::ofType($this->getType())->get();

        return $this->compose($tasks);
    }

    public function compose(Collection $tasks)
    {
        return $tasks->map(function (Task $item) {
            return [
                'id'     => $item->getTitle(),
                'zorluk' => $item->getDifficulty(),
                'sure'   => $item->getTime()
            ];
        });
    }
}
