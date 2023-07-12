<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use App\Notifications\DeadlineApproachingNotification;
class DeadlineNotificationCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:notify-deadlines';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notifications for tasks approaching their deadlines';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tasks = Task::where('deadline', '<=', now()->addDay())->get();

        foreach ($tasks as $task) {
            $task->user->notify(new DeadlineApproachingNotification($task));
        }

        $this->info('Deadline notifications sent successfully.');
    }
}
