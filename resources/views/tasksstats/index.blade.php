@extends('layouts.appdefault')
@section('title', 'Tasks Statistics')

@section('sidebar')
	@parent
	<div>
		<a href="{{ url('tasks') }}" title="View all Tasks">View All Tasks</a>
	</div>
@endsection

@section('content')
	@include('tasksstats.tasksstats')
@endsection