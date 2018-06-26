@extends('layouts.appdefault')
@section('title', 'Application Access Keys')

@section('sidebar')
	<div>
	This content replaces the master side bar content entirely. <br />
	This page lists the keys that have been generated and can be used to access certain areas of the application.
	</div>
@endsection

@section('content')
	<?php $keysAreAvailable = ((isset($keys)) && (count($keys) > 0)); ?>

	@if (!$keysAreAvailable)
	<div>There are no keys from the database to display at this time. Please contact the boss.</div>
	@else
	<div>
		<p>App Access Keys - These {{ @count($keys) }} keys have been retrieved from the Database</p>
		<table align="centre">
			<thead>
				<th>Sn</th>
				<th>User ID</th>
				<th>Key</th>
				<th>Expiry Date</th>
				<th>Action</th>
			</thead>
			@foreach($keys as $key)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $key->user_id }}</td>
				<td>{{ $key->user_key }}</td>
				<td>{{ $key->expiry_date }}</td>
				<td><a href=" {{ route('keys.show', ['id' => $key->id]) }}">View Details</a></td>
			</tr>
			@endforeach
		</table>
	</div>
	@endif


@endsection