@extends('layouts.appdefault')
@section('title', 'Welcome Home')

@section('sidebar')
	@parent
	<div>This is appended to the master side bar and is the content from Mr Welcome Blade Page.</div>
@endsection

@section('content')
	<p>
		This content was generated @ <?php echo date('l jS \of F Y h:i:s A'); ?> within the Welcome Blade Page.
		<br />Name Variable Passed to the View => {{ $name }}
	</p>

	<hr />

	<p>Some Current Tasks Statistics rendered via a View Composer</p>
	@include('tasksstats.tasksstats')
@endsection