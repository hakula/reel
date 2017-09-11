@extends('layouts.main')

@section('main')
<!-- Header -->
<div class="page-header">
	<h1>{{ $job->name }}</h1>
</div>
<!-- Display alert message -->
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
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
<!-- Job Applicant Form -->
<form method="post" action="/jobs/{{ $job->id }}/applicants">
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" id="name" placeholder="Name" name="attributes[name]" value="{{ request()->old('attributes.name') }}">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" id="email" placeholder="Email" name="attributes[email]" value="{{ request()->old('attributes.email') }}">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="website">Website</label>
				<input type="text" class="form-control" id="website" placeholder="Website" name="attributes[website]" value="{{ request()->old('attributes.website') }}">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="skills">Skills</label>
				<textarea name="skills" id="skills" class="form-control" rows="3">{{ request()->old('skills') }}</textarea>
				<p class="help-block">Please enter one per line.</p>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="cover_letter">Cover Letter</label>
				<textarea name="attributes[cover_letter]" id="cover_letter" class="form-control" rows="3">{{ request()->old('attributes.cover_letter') }}</textarea>
			</div>
		</div>
	</div>
	<div class="form-group">
		<input class="btn btn-primary" type="submit" value="Submit">
	</div>
	{{ csrf_field() }}
</form>
@endsection