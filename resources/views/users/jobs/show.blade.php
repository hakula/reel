@extends('layouts.main')

@section('main')	
<div class="page-header">
	<h1>
		{{ $job->name }} 
		<span class="pull-right">
			<a class="btn btn-primary" href="/users/{{ Auth::user()->id }}/jobs/{{ $job->id }}/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
			<a class="btn btn-info" href="/jobs/{{ $job->id }}" target="_blank"><i class="fa fa-search" aria-hidden="true"></i> View</a>
		</span>
	</h1>
</div>
<div class="row">
	<div class="col-sm-12">
		{!! nl2br($job->description) !!}
	</div>
</div>
<h3>Applicants</h3>
<div class="panel-group panel-group-applicants" id="accordion-applicants" role="tablist" aria-multiselectable="true">
	@foreach($applicants as $applicant)
	<div class="panel panel-default panel-applicant">
		<div class="panel-heading panel-heading-applicant" role="tab" id="panel-heading-applicant-{{ $applicant->id }}">
			<h4 class="panel-title">
				<a role="button" data-toggle="collapse" data-parent="#accordion-applicants" href="#panel-collapse-applicant-{{ $applicant->id }}" aria-expanded="true" aria-controls="panel-collapse-applicant-{{ $applicant->id }}">
					{{ $applicant->name }}
				</a>
				<span class="pull-right">{{ $applicant->created_at->diffForHumans() }}</span>
			</h4>
		</div>
		<div id="panel-collapse-applicant-{{ $applicant->id }}" class="panel-collapse panel-collapse-applicant collapse" role="tabpanel" aria-labelledby="panel-heading-applicant-{{ $applicant->id }}">
			<div class="panel-body">
				<dl class="dl-horizontal">
					<dt>Email</dt>
					<dd><a href="mailto:{{ $applicant->email }}"> {{ $applicant->email }}</a></dd>
					<dt>Website</dt>
					<dd><a href="{{ $applicant->website }}" target="_blank">{{ $applicant->website }}</a></dd>
					<dt>Skills</dt>
					<dd>{{ $applicant->skills->implode('name', ', ') }}</dd>
					<dt>Cover Letter</dt>
					<dd>{{ nl2br($applicant->cover_letter) }}</dd>
				</dl>
			</div>
		</div>
	</div>
	@endforeach
</div>

{{ $applicants->links() }}

@endsection