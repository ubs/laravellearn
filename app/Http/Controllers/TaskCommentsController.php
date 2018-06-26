<?php

namespace App\Http\Controllers;

use App\Models\TaskComment;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(Request $request)
    public function store(Task $task)
    {
        $this->validate(request(), [
            //$rules are denoted by Field => Pipe separated list of validation requirements
            'taskcomment' => 'required|min:5|max:150'
        ]);
        
        //Approach-1: Directly from TaskCommentsController
        /**TaskComment::create([
            'task_id' => $task->id,
            'comment_owner_id' => 1,
            'comment' => request('taskcomment')
        ]);**/
        
        //Approach-2: Responsibility lies with task to add a comment
        $task->addComment(request('taskcomment'));
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskComment  $taskComment
     * @return \Illuminate\Http\Response
     */
    public function show(TaskComment $taskComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskComment  $taskComments
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskComment $taskComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TaskComment  $taskComments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskComment $taskComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskComment  $taskComments
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskComment $taskComment)
    {
        //
    }
}
