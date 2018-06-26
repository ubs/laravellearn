@extends('layouts.appdefault')

<?php $keyVariableIsSet = (@isset($key) && !is_null($key)); ?>

@section('title', (($keyVariableIsSet) ? ($key->user_key) : ('expected key not found')))

@section('sidebar')
	@parent
	<div>View all <a href="{{ url('keys') }}" title="view all keys">Keys</a></div>
@endsection

@section('content')
	@if (!$keyVariableIsSet)
	<div>My child, the key you seek has gone 404. Please consult the KeyMaker or Click the link above to view all keys</div>
	@else
	<div>
		<h3>Details for Key #{{ $key->id }}:</h3>
		<ul>
			<li>Key Owner: {{ $key->user_id }}</li>
			<li>Key Code: {{ $key->user_key }}</li>
			<li>Expiry Date: {{ $key->expiry_date }}</li>
			<li>Created: {{ $key->created_at }}</li>
			<li>Last Updated: {{ $key->updated_at }}</li>
		</ul>
	</div>
	@endif
@endsection