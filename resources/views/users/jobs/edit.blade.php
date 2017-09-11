@extends('layouts.main')

@section('main')
<!-- Page Header -->
<div class="page-header">
	<h1>Edit Job <small></h1>
</div>
<!-- Display errors -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<!-- Edit user job form -->
<form method="post" action="/users/{{ $user->id }}/jobs/{{ $job->id }}">	
	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" class="form-control" id="name" name="attributes[name]" placeholder="Name" value="{{ $job->name }}">
	</div>
	<div class="form-group">		
		<button type="submit" class="btn btn-primary">Update</button>		
		<a class="btn btn-default" href="/users/{{ $user->id }}/jobs">Cancel</a>
	</div>
	{{ method_field('PUT') }}
	{{ csrf_field() }}
</form>

@endsection	