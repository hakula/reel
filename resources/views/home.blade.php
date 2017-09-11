@extends('layouts.main')

@section('main')
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
		    <div class="panel-heading">Summary</div>
		    <div class="panel-body">
		        <div class="row">
			        <div class="col-md-6">
				        <p class="lead"><i class="fa fa-newspaper-o" aria-hidden="true"></i> <a href="/users/{{ $user->id }}/jobs">{{ $user->jobs->count() }} Jobs</a></p>
			        </div>
			        <div class="col-md-6">
				        <p class="lead"><i class="fa fa-address-card-o" aria-hidden="true"></i> <a href="/users/{{ $user->id }}/applicants"> {{ $user->applicants->count() }} Applicants</a></p>
			        </div>			        
		        </div>
		    </div>
		</div>		
	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
		    <div class="panel-heading">Activity</div>
		    <ul class="list-group">
			@foreach($user->applicants()->orderBy('created_at', 'desc')->take(5)->get() as $applicant)
				<li class="list-group-item">
					<span>{{ $applicant->created_at->format('M jS, g:i:s a') }}</span> <a href="/users/{{ $user->id }}/jobs/{{ $applicant->job->id }}">{{ $applicant->name }} applied for {{ $applicant->job->name }}</a>
				</li>
			@endforeach
		    </ul>
		</div>		
	</div>
</div>
@endsection
