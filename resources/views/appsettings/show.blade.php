@extends('layouts.appdefault')

<?php $settingVariableIsSet = @isset($setting); ?>

@section('title', ($settingVariableIsSet) ? $setting->setting : 'Setting Details')

@section('sidebar')
	@parent
	<div>
		<a href="{{ url('settings') }}" title="view all application settings">View all Settings</a>
		&nbsp;|&nbsp;
		<a href="{{ url('settings/create') }}" title="Add new application setting">Add New Setting</a>
	</div>
@endsection

@section('content')
	@if (!$settingVariableIsSet)
	<div>The application setting you are seeking has gone 404. Click the link above to view all available settings</div>
	@else
	<div>
		<h3>Details for Application Setting #{{ $setting->id }}:</h3>
		<ul>
			<li>Setting: {{ $setting->setting }}</li>
			<li>Value: {{ $setting->value }}</li>
			<li>Status: {{ $setting->is_active ? 'Active' : 'Disabled' }}</li>
			<li>Created: {{ $setting->created_at }}</li>
			<li>Last Updated: {{ $setting->updated_at }}</li>
		</ul>
	</div>
	@endif
@endsection