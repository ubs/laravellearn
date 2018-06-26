@extends('layouts.appdefault')
@section('title', 'About Page')

@section('sidebar')
	@parent
	<div>This is appended to the master side bar and is the content from Mr About Blade Page.</div>
@endsection

@section('content')
	<p>Copyright Statement: <?php echo $copyright; ?> </p>
@endsection
