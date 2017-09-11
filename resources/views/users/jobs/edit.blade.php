@extends('layouts.main')

@section('main')
<div class="page-header">
	<h1>Edit Job <small></h1>
</div>
<form method="post" action="/users/{{ $user->id }}/jobs/{{ $job->id }}">	
	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" class="form-control" id="name" name="attributes[name]" placeholder="Name" value="{{ $job->name }}">
	</div>
	<div class="form-group">
		<label for="description">Description</label>
		<textarea class="form-control" id="description" name="attributes[description]" rows="3">{{ $job->description }}</textarea>		
	</div>
	<div class="form-group">		
		<button type="submit" class="btn btn-primary">Update</button>		
		<a class="btn btn-default" href="/users/{{ $user->id }}/jobs">Cancel</a>
	</div>
	{{ method_field('PUT') }}
	{{ csrf_field() }}
</form>
@endsection	