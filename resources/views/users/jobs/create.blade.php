@extends('layouts.main')

@section('main')	
<div class="page-header">
		<h1>Add New Job</h1>		
</div>
<form method="post" action="/users/{{ $user->id }}/jobs">	
	<div class="form-group">
		<label for="exampleInputEmail1">Name</label>
		<input type="text" class="form-control" id="name" name="attributes[name]" placeholder="Name">
	</div>
	<div class="form-group">		
		<button type="submit" class="btn btn-primary">Submit</button>
		<a class="btn btn-default" href="/users/{{ $user->id }}/jobs">Cancel</a>
	</div>
	{{ csrf_field() }}
</form>

@endsection