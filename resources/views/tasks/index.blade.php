@extends('layouts.appdefault')
@section('title', 'My Tasks')

@section('sidebar')
	@parent
	<div>
		<a href="{{ url('tasks/create') }}" title="Create Task">Create a New Task</a>
		&nbsp; | &nbsp;
		<a href="{{ url('tasks-stats') }}" title="View some task statistics">View Tasks Stats</a>
	</div>
@endsection

@section('content')
	<div>
		<p>List of tasks for you</p>
		<ul>
		<?php foreach ($tasks as $task): ?>
			<li><?php echo 'Task: ' . $task; ?></li>
		<?php endforeach; ?>
		</ul>
	</div>
	
	@if (count($tasks) > 0)
	<div>
		<p>List of tasks for you using Blade Templating Language</p>
		<ul>
		@foreach ($tasks as $task)
			<li>{{ 'Task: ' . $task }}</li>
		@endforeach
		</ul>
	</div>
	@else
	<div>There are no tasks to display at this time. Check back in ten minutes time</div>
	@endif
	
	<!-- Some tasks from the database this time -->
	<?php $tasksAreAvailable = ((isset($tasksFromDB)) && (count($tasksFromDB) > 0)); ?>

	@if (!$tasksAreAvailable)
	<div>There are no tasks from the database to display at this time. Check back in ten minutes time</div>
	@else
	<div>
		<p>DB Tasks - These {{ @count($tasksFromDB) }} tasks have been queried from the Database</p>
		
		<table align="centre">
			<thead>
				<th>Sn</th>
				<th>User</th>
				<th>Task Title</th>
				<th>Task Description</th>
				<th>Created</th>
				<th>Last Updated</th>
				<th>Actions</th>
			</thead>
			@foreach($tasksFromDB as $dbTask)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $dbTask->user->getFullname() }}</td>
				<td align="left">{{ $dbTask->title }}</td>
				<td align="left">{{ substr($dbTask->task_desc,0,20) . '....' }}</td>
				<td>{{ $dbTask->created_at }}</td>
				<td>{{ $dbTask->updated_at->diffForHumans() }}</td>
				<td>
					<a href=" {{ route('tasks.show', ['id' => $dbTask->id]) }}">View Details</a>
					&nbsp;|&nbsp;
					<a href=" {{ url('tasks/edit/' . $dbTask->id) }}">Edit</a>
					&nbsp;|&nbsp;
					<a href=" {{ url('tasks/delete/' . $dbTask->id) }}">Delete</a>
				</td>
			</tr>
			@endforeach
		</table>

	</div>
	@endif


@endsection