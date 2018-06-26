@extends('layouts.appdefault')
@section('title', 'Create a new application setting')

<?php $settingsURL = url('settings'); ?>

@section('sidebar')
	<div>View all <a href="{{ $settingsURL }}" title="view settings">Settings</a></div>
@endsection

@section('content')
	<div align="left">
		<h2>Create an application setting</h2>
		
		<form method="POST" action="{{ $settingsURL }}">
			{{ csrf_field() }}

			<div class="form-group">
			  <label for="settingtitle">Setting Title</label><br/>
			  <input name="setting" type="text" value="{{ old('setting') }}" class="form-control" id="settingtitle" required>
			</div>

			<br/>

			<div class="form-group">
			  <label for="settingvalue">Setting Value</label><br/>
			  <input name="value" type="text" value="{{ old('value') }}" class="form-control" id="settingvalue" required>
			</div>

			<br/>

		  <button type="submit" class="btn btn-default">{{ __('Save Setting') }}</button>
		</form>

		@include('commons.formvalerrors')

	</div>
@endsection