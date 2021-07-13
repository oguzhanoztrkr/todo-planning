<?php

namespace App\Tasks;

use App\Models\Task;
use Illuminate\Support\Collection;

class ItTaskPlanning extends TaskPlanning
{
    public function getComposedTasks(): Collection
    {
        $tasks = Task::ofType($this->getType())->get();

        return $this->compose($tasks);
    }

    public function getTasks(): Collection
    {
        return Task::query()
                   ->ofType($this->getType())
                   ->orderByDesc('difficulty')
                   ->orderByDesc('time')
                   ->get();
    }

    public function factoryMethod(): TaskPlanning
    {
        return new ItTaskPlanning($this->getType());
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
