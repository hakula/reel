@extends('layouts.main')

@section('main')	
<div class="page-header">
	<h1>Applicants</h1>
</div>

<div class="panel-group panel-group-applicants" id="accordion-applicants" role="tablist" aria-multiselectable="true">
	@foreach($applicants as $applicant)
	<div class="panel panel-default panel-applicant">
		<div class="panel-heading panel-heading-applicant" role="tab" id="panel-heading-applicant-{{ $applicant->id }}">
			<h4 class="panel-title">
				<a role="button" data-toggle="collapse" data-parent="#accordion-applicants" href="#panel-collapse-applicant-{{ $applicant->id }}">
					{{ $applicant->name }}
				</a> 
				<span class="label label-default">{{ $applicant->job->name }}</span>
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