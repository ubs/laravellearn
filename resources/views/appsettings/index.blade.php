@extends('layouts.appdefault')
@section('title', 'Application Settings')

@section('sidebar')
	<div>
		<a href="{{ url('settings/create') }}" title="Add new application setting">Add New Setting</a>
	</div>
@endsection

@section('content')
	<?php
		$settingsAreAvailable = ((isset($settings)) && (count($settings) > 0)); 
	?>

	@if (!$settingsAreAvailable)
	<div>Application settings have not yet been defined. Please use the link above to define some settings.</div>
	@else
	<div>
		<p>Application Settings - These {{ @count($settings) }} settings have been retrieved from the Database</p>
		<table align="centre">
			<thead>
				<th>Sn</th>
				<th>Setting</th>
				<th>Current Value</th>
				<th>Status</th>
				<th>Last Updated</th>
				<th>Action</th>
			</thead>
			@foreach($settings as $setting)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td align="left">{{ $setting->setting }}</td>
				<td>{{ $setting->value }}</td>
				<td>{{ $setting->is_active ? 'Active' : 'Disabled' }}</td>
				<td>{{ $setting->updated_at->diffForHumans() }}</td>
				<td>
					<a href=" {{ route('settings.show', ['id' => $setting->id]) }}">View Details</a>
					&nbsp;|&nbsp;
					<a href=" {{ route('settings.show', ['id' => $setting->id]) }}">Deactivate</a>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
	@endif
@endsection