<?php

namespace App\Http\Controllers;

use App\Models\Task;

class TasksController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function create(){
        return view('tasks.create');
    }
    
    public function store(){
        //Game Plan >>
        //[Model -> Create new task, save to DB];
        //[Controller -> confirm success and redirect to another page]

        $newTask = Task::store();
        
        //Alternative ways to do it using the model relationships you have set up
        //request()->request->add(['task_desc' => request('description')]); //To provide the right DB field else, fails
        //$newTask = auth()->user()->makeTask(new Task( request(['title', 'task_desc']) ));
        
        //OR explicitly named in the passed array like this
        //$newTask = auth()->user()->makeTask(new Task( ['title' => request('title'), 'task_desc' => request('description')] )); 

        $success = $newTask instanceof Task;
        
        $infoBarMsg = ($success) ?
            sprintf('New Task [id: #%s] successfully created: %s', $newTask->id, $newTask->title) :
            'Error: sorry, new task could not be created at this time';
        
        request()->getSession()->flash('infoBarMessage', $infoBarMsg);
        
        return ($success) ?
            redirect( route('tasks.show', ['id' => $newTask->id]) ) :
            redirect('tasks');
    }
}
