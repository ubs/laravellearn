@extends('layouts.appdefault')
@section('title', 'Create a new task')

<?php $tasksURL = url('tasks'); ?>

@section('sidebar')
	<div>View all <a href="{{ $tasksURL }}" title="view all tasks">Tasks</a></div>
@endsection

@section('content')
	<div align="left">
		<h2>Create a Task</h2>
		
		<form method="POST" action="{{ $tasksURL }}">
			{{ csrf_field() }}

			<div class="form-group">
			  <label for="tasktitle">Task title</label><br/>
			  <input name="title" type="text" class="form-control" id="tasktitle" placeholder="Title" required>
			</div>

			<br/>

			<div class="form-group">
			  <label for="taskdesc">Task Description</label><br/>
			  <textarea name="description" type="text" class="form-control" id="taskdesc"></textarea>
			</div>

			<br/>

		  <button type="submit" class="btn btn-default">Create Task</button>
		</form>

		@include('commons.formvalerrors')
		
	</div>
@endsection