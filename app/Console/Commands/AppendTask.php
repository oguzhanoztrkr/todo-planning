<?php

namespace App\Console\Commands;

use App\Models\Task;
use Illuminate\Console\Command;

class AppendTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:append';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new task with inputs';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $title = $this->ask('Please insert task title');

        $category = $this->choice('What is the task\'s category?', [
            'business',
            'it'
        ]);

        $level = $this->choice('What is the task\'s level', [1, 2, 3, 4, 5]);

        $time = $this->ask('How long for this task?');

        if (! is_numeric($time)) {
            $this->error('Please enter time as numeric.');

            return 0;
        }

        try {
            Task::create([
                'time'       => $time,
                'difficulty' => $level,
                'title'      => $title,
                'type'       => $category,
            ]);

            $this->info('Task created.');

            return 1;
        } catch (\Exception $e) {
            $this->error('There is some problem when creating task.');
        }

        return 0;
    }
}
