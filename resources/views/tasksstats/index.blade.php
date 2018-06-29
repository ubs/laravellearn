@extends('layouts.appdefault')
@section('title', 'Tasks Statistics')

@section('sidebar')
	@parent
	<div>
		<a href="{{ url('tasks') }}" title="View all Tasks">View All Tasks</a>
	</div>
@endsection

@section('content')
	<div>
		<p>Task Archives</p>
		<?php $archivesAreAvailable = ((isset($taskArchives)) && (count($taskArchives) > 0)); ?>
		@if (!$archivesAreAvailable)
		<div>
			No Task Archives available at this time. Add tasks <a href="{{ url('tasks/create') }}" title="Create Task">here</a>
		</div>
		@else
		
		<ul>
		@foreach($taskArchives as $archive)
		<li>
			<a href="{{ url('tasksfiltered') }}/?month={{ $archive->month_name_created }}&year={{ $archive->year_created }}" title="View tasks for {{ $archive->month_name_created }}">
			{{ $archive->month_name_created }} {{ $archive->year_created }} [{{ $archive->total_per_month }} tasks]
			</a>
		</li>
		@endforeach
		</ul>

		@endif
	</div>
@endsection