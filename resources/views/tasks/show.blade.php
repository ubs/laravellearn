@extends('layouts.appdefault')

<?php $taskVariableIsSet = @isset($task); ?>

@section('title', ($taskVariableIsSet) ? $task->title : 'Task Details')

@section('sidebar')
	@parent
	<div>
		<a href="{{ url('tasks') }}" title="view all tasks">View all Tasks</a>
		&nbsp;|&nbsp;
		<a href="{{ url('tasks/create') }}" title="Create Task">Create a New Task</a>
	</div>
@endsection

@section('content')
	@if (!$taskVariableIsSet)
	<div>The task you are seeking has gone 404. Click the link above to view all available tasks</div>
	@else
	<div>
		<h3>Details for task #{{ $task->id }}:</h3>
		<ul>
			<li>Owner: {{ $task->user_id }}</li>
			<li>Title: {{ $task->title }}</li>
			<li>Description: {{ $task->task_desc }}</li>
			<li>Created: {{ $task->created_at }}</li>
			<li>Last Updated: {{ $task->updated_at }}</li>
		</ul>
	</div>

	<hr />

	<div>
		<h3>Comments (task progress, closure notes, etc.)</h3>
		<ul>
			@foreach($task->taskComments as $taskComment)
			<li>{{ $taskComment->created_at->diffForHumans() }} : {{ $taskComment->comment }}</li>
			@endforeach
		</ul>
	</div>

	<hr />

	<div>
		<h3>Add Task Comment</h3>
		<?php $addCommentURL = url(sprintf('tasks/%s/comments', $task->id)); ?>
		<form method="POST" action="{{ $addCommentURL }}">
			{{ csrf_field() }}

			<div class="form-group">
			  <label for="taskcomment">Task Comment</label><br/>
			  <textarea name="taskcomment" type="text" class="form-control" id="taskcomment" required>{{ old('taskcomment') }}</textarea>
			</div>

		  <br />
		  <button type="submit" class="btn btn-default">Add Comment</button>
		</form>

		@include('commons.formvalerrors')
		
	</div>
	@endif
@endsection