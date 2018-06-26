@if (@count($errors))
<div style="background: #FFE6E6; margin-top: 5px; padding: 3px; color: #000;">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
<br />
@endif