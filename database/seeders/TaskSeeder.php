<?php

namespace Database\Seeders;

use App\ValueObjects\TaskType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itTasks = json_decode('[{"zorluk":3,"sure":6,"id":"IT Task 0"},{"zorluk":4,"sure":6,"id":"IT Task 1"},{"zorluk":3,"sure":10,"id":"IT Task 2"},{"zorluk":4,"sure":4,"id":"IT Task 3"},{"zorluk":3,"sure":5,"id":"IT Task 4"},{"zorluk":1,"sure":12,"id":"IT Task 5"},{"zorluk":1,"sure":4,"id":"IT Task 6"},{"zorluk":5,"sure":6,"id":"IT Task 7"},{"zorluk":3,"sure":8,"id":"IT Task 8"},{"zorluk":1,"sure":6,"id":"IT Task 9"},{"zorluk":2,"sure":10,"id":"IT Task 10"},{"zorluk":1,"sure":6,"id":"IT Task 11"},{"zorluk":4,"sure":11,"id":"IT Task 12"},{"zorluk":5,"sure":3,"id":"IT Task 13"},{"zorluk":1,"sure":11,"id":"IT Task 14"},{"zorluk":4,"sure":6,"id":"IT Task 15"},{"zorluk":5,"sure":4,"id":"IT Task 16"},{"zorluk":3,"sure":11,"id":"IT Task 17"},{"zorluk":2,"sure":11,"id":"IT Task 18"},{"zorluk":3,"sure":8,"id":"IT Task 19"},{"zorluk":3,"sure":11,"id":"IT Task 20"},{"zorluk":1,"sure":5,"id":"IT Task 21"},{"zorluk":4,"sure":5,"id":"IT Task 22"},{"zorluk":2,"sure":7,"id":"IT Task 23"},{"zorluk":2,"sure":6,"id":"IT Task 24"},{"zorluk":3,"sure":9,"id":"IT Task 25"},{"zorluk":4,"sure":6,"id":"IT Task 26"},{"zorluk":4,"sure":7,"id":"IT Task 27"},{"zorluk":1,"sure":4,"id":"IT Task 28"},{"zorluk":4,"sure":5,"id":"IT Task 29"},{"zorluk":5,"sure":9,"id":"IT Task 30"},{"zorluk":2,"sure":5,"id":"IT Task 31"},{"zorluk":2,"sure":5,"id":"IT Task 32"},{"zorluk":2,"sure":6,"id":"IT Task 33"},{"zorluk":5,"sure":6,"id":"IT Task 34"},{"zorluk":1,"sure":10,"id":"IT Task 35"},{"zorluk":1,"sure":10,"id":"IT Task 36"},{"zorluk":1,"sure":10,"id":"IT Task 37"},{"zorluk":5,"sure":12,"id":"IT Task 38"},{"zorluk":4,"sure":12,"id":"IT Task 39"},{"zorluk":2,"sure":6,"id":"IT Task 40"},{"zorluk":3,"sure":8,"id":"IT Task 41"},{"zorluk":5,"sure":10,"id":"IT Task 42"},{"zorluk":3,"sure":10,"id":"IT Task 43"},{"zorluk":5,"sure":8,"id":"IT Task 44"},{"zorluk":5,"sure":9,"id":"IT Task 45"},{"zorluk":3,"sure":3,"id":"IT Task 46"},{"zorluk":4,"sure":4,"id":"IT Task 47"},{"zorluk":1,"sure":12,"id":"IT Task 48"},{"zorluk":1,"sure":7,"id":"IT Task 49"},{"zorluk":1,"sure":4,"id":"IT Task 50"},{"zorluk":1,"sure":10,"id":"IT Task 51"},{"zorluk":4,"sure":8,"id":"IT Task 52"},{"zorluk":3,"sure":3,"id":"IT Task 53"},{"zorluk":4,"sure":10,"id":"IT Task 54"},{"zorluk":4,"sure":12,"id":"IT Task 55"},{"zorluk":3,"sure":10,"id":"IT Task 56"},{"zorluk":2,"sure":11,"id":"IT Task 57"},{"zorluk":1,"sure":7,"id":"IT Task 58"},{"zorluk":2,"sure":4,"id":"IT Task 59"},{"zorluk":3,"sure":4,"id":"IT Task 60"},{"zorluk":1,"sure":3,"id":"IT Task 61"},{"zorluk":1,"sure":6,"id":"IT Task 62"},{"zorluk":3,"sure":3,"id":"IT Task 63"},{"zorluk":4,"sure":12,"id":"IT Task 64"},{"zorluk":2,"sure":11,"id":"IT Task 65"},{"zorluk":3,"sure":10,"id":"IT Task 66"}]', true);
        $businessTasks = json_decode('[{"Business Task 0":{"level":1,"estimated_duration":7}},{"Business Task 1":{"level":3,"estimated_duration":4}},{"Business Task 2":{"level":1,"estimated_duration":6}},{"Business Task 3":{"level":5,"estimated_duration":4}},{"Business Task 4":{"level":2,"estimated_duration":7}},{"Business Task 5":{"level":5,"estimated_duration":7}},{"Business Task 6":{"level":4,"estimated_duration":5}},{"Business Task 7":{"level":2,"estimated_duration":11}},{"Business Task 8":{"level":4,"estimated_duration":12}},{"Business Task 9":{"level":1,"estimated_duration":4}},{"Business Task 10":{"level":2,"estimated_duration":7}},{"Business Task 11":{"level":4,"estimated_duration":3}},{"Business Task 12":{"level":3,"estimated_duration":10}},{"Business Task 13":{"level":1,"estimated_duration":3}},{"Business Task 14":{"level":2,"estimated_duration":10}},{"Business Task 15":{"level":2,"estimated_duration":12}},{"Business Task 16":{"level":3,"estimated_duration":9}},{"Business Task 17":{"level":4,"estimated_duration":9}},{"Business Task 18":{"level":1,"estimated_duration":7}},{"Business Task 19":{"level":4,"estimated_duration":4}},{"Business Task 20":{"level":5,"estimated_duration":4}},{"Business Task 21":{"level":4,"estimated_duration":4}},{"Business Task 22":{"level":2,"estimated_duration":5}},{"Business Task 23":{"level":5,"estimated_duration":9}},{"Business Task 24":{"level":5,"estimated_duration":12}},{"Business Task 25":{"level":3,"estimated_duration":9}},{"Business Task 26":{"level":2,"estimated_duration":12}},{"Business Task 27":{"level":3,"estimated_duration":9}},{"Business Task 28":{"level":1,"estimated_duration":7}},{"Business Task 29":{"level":4,"estimated_duration":4}},{"Business Task 30":{"level":4,"estimated_duration":4}},{"Business Task 31":{"level":1,"estimated_duration":7}},{"Business Task 32":{"level":4,"estimated_duration":7}},{"Business Task 33":{"level":3,"estimated_duration":9}},{"Business Task 34":{"level":2,"estimated_duration":9}},{"Business Task 35":{"level":1,"estimated_duration":9}},{"Business Task 36":{"level":5,"estimated_duration":3}},{"Business Task 37":{"level":4,"estimated_duration":5}},{"Business Task 38":{"level":1,"estimated_duration":9}},{"Business Task 39":{"level":5,"estimated_duration":7}},{"Business Task 40":{"level":1,"estimated_duration":6}},{"Business Task 41":{"level":1,"estimated_duration":5}},{"Business Task 42":{"level":5,"estimated_duration":9}},{"Business Task 43":{"level":1,"estimated_duration":9}},{"Business Task 44":{"level":5,"estimated_duration":8}},{"Business Task 45":{"level":5,"estimated_duration":8}},{"Business Task 46":{"level":1,"estimated_duration":9}},{"Business Task 47":{"level":1,"estimated_duration":12}},{"Business Task 48":{"level":1,"estimated_duration":3}},{"Business Task 49":{"level":5,"estimated_duration":7}},{"Business Task 50":{"level":5,"estimated_duration":12}},{"Business Task 51":{"level":1,"estimated_duration":11}},{"Business Task 52":{"level":3,"estimated_duration":7}},{"Business Task 53":{"level":1,"estimated_duration":3}},{"Business Task 54":{"level":4,"estimated_duration":10}},{"Business Task 55":{"level":2,"estimated_duration":11}},{"Business Task 56":{"level":4,"estimated_duration":9}},{"Business Task 57":{"level":3,"estimated_duration":7}},{"Business Task 58":{"level":2,"estimated_duration":4}},{"Business Task 59":{"level":4,"estimated_duration":9}},{"Business Task 60":{"level":2,"estimated_duration":10}},{"Business Task 61":{"level":3,"estimated_duration":8}},{"Business Task 62":{"level":1,"estimated_duration":10}},{"Business Task 63":{"level":4,"estimated_duration":11}},{"Business Task 64":{"level":4,"estimated_duration":5}},{"Business Task 65":{"level":3,"estimated_duration":9}},{"Business Task 66":{"level":1,"estimated_duration":3}}]', true);

        $taskList = [];
        foreach ($itTasks as $task) {
            $taskList[] = [
                'time'       => $task['sure'],
                'difficulty' => $task['zorluk'],
                'title'      => $task['id'],
                'type'       => TaskType::it()->getValue(),
            ];
        }

        foreach ($businessTasks as $key => $task) {
            $title = key($task);
            $taskValues = $task[$title];

            $taskList[] = [
                'time'       => $taskValues['estimated_duration'],
                'difficulty' => $taskValues['level'],
                'title'      => $title,
                'type'       => TaskType::business()->getValue(),
            ];
        }

        DB::table('tasks')->insert($taskList);
    }
}
