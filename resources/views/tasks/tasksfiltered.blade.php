@extends('layouts.appdefault')
@section('title', 'My Tasks (filtered)')

@section('sidebar')
	@parent
	<div>
		<a href="{{ url('tasks/create') }}" title="Create more tasks">Create a New Task</a>
		&nbsp; | &nbsp;
		<a href="{{ url('tasks-stats') }}" title="Back to task statistics">Back to Tasks Stats</a>
	</div>
@endsection

@section('content')
	<?php $tasksAreAvailable = ((isset($tasks)) && (count($tasks) > 0)); ?>
	@if (!$tasksAreAvailable)
	<div>There are no tasks in the database for the specified period.</div>
	@else
	<div>
		<p>Filtered Tasks - These {{ @count($tasks) }} tasks have been found for {{ $month }}, {{ $year }}</p>
		
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
			@foreach($tasks as $dbTask)
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