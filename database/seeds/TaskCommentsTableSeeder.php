<?php

use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\TaskComment;

class TaskCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allTasks = Task::all();
        
        foreach ($allTasks as $task) {
            if (random_int(0, 10) > 5) continue;
            $taskComment = new TaskComment();
            $taskComment->task_id = $task->id;
            $taskComment->comment = 'Some random comments for this task';
            $taskComment->comment_owner_id = 1;
            $taskComment->saveOrFail();
        }
    }
}
