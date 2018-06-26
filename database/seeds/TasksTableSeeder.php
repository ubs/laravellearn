<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * 
     * @var array of seed tasks
     * array(owner, title/description)
     */
    private $arrSeeds = array(
        array(1, 'Wake up and exercise'),
        array(1, 'Clean up the kitchen'),
        array(1, 'Make chips and eggs for breakfast'),
        array(1, 'Learn Laravel for a bit'),
    );
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        foreach ($this->arrSeeds as $seed){
            $task = new Task();
            $task->user_id = $seed[0];
            $task->title = $seed[1];
            $task->task_desc = $seed[1];
            $task->created_at = Carbon::now();
            $task->updated_at = Carbon::now();
            $task->saveOrFail();
        }
    }
}
