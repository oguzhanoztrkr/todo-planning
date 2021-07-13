<?php

namespace Tests\Unit;

use Tests\TestCase;

class AppendTaskCommandTest extends TestCase
{
    public function testAppendTaskSuccess()
    {
        $this->artisan('task:append')
             ->expectsQuestion('Please insert task title', 'A new Task')
             ->expectsQuestion('What is the task\'s category?', 'business')
             ->expectsQuestion('What is the task\'s level', 1)
             ->expectsQuestion('How long for this task?', 10)
             ->expectsOutput('Task created.')
             ->assertExitCode(1);
    }

    public function testFailedForTimeInput()
    {
        $this->artisan('task:append')
             ->expectsQuestion('Please insert task title', 'A new Task2')
             ->expectsQuestion('What is the task\'s category?', 'it')
             ->expectsQuestion('What is the task\'s level', 2)
             ->expectsQuestion('How long for this task?', 'wrong time')
             ->expectsOutput('Please enter time as numeric.')
             ->assertExitCode(0);
    }
}
