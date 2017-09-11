@extends('layouts.main')

@section('main')
<div class="page-header">
	<h1>Settings <small></h1>
</div>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<!-- User Edit Form -->
<form method="post" action="/users/{{ $user->id }}">
	<div class="form-group">
		<label for="">Name</label>
		<input type="text" class="form-control" id="name" placeholder="Name" name="attributes[name]" value="{{ $user->name }}">
	</div>
	<div class="form-group">
		<label for="">Email</label>
		<input type="email" class="form-control" id="email" placeholder="Email" name="attributes[email]" value="{{ $user->email }}">
	</div>
	<div class="form-group">		
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>
	{{ method_field('PUT') }}
	{{ csrf_field() }}
</form>
@endsection	