@extends('layouts.share')

@section('content')
<table class="job-applicants">
	<thead>
		<tr>
			<th>Job</th>
			<th>Applicant Name</th>
			<th>Email Address</th>
			<th>Website</th>
			<th>Skills</th>
			<th>Cover Letter Paragraph</th>
		</tr>
	</thead>		
	<tbody>
	
	{{-- Loop through jobs --}}	
	@foreach($jobs as $job) 	
	<!-- {{ $job->name }} -->		
		
		{{-- Loop through job applicants --}}				
		@foreach($job->applicants as $applicant)		
		<tr>
			
			{{-- Check if first iteration to avoid displaying job for each applicant of a given job --}}						
			@if($loop->first)
			
			{{-- Use job skills count for rowspan as they determine the rowspan of each applicant row --}}
			{{-- ($job->skills joins skills to applicants and constrains the query on applicant.job_id) --}}
			<td rowspan="{{ $job->skills->count() }}" class="job-name">{{ $job->name }}</td>
			@endif
			
			{{-- Use applicant skills count for rowspan as all other applicant columns contain a single cell except skills --}}
			<td rowspan="{{ $applicant->skills->count() }}" class="applicant-name">{{ $applicant->name }}</td>
			<td rowspan="{{ $applicant->skills->count() }}"><a href="mailto:{{ $applicant->email }}">{{ $applicant->email }}</a></td>
			<td rowspan="{{ $applicant->skills->count() }}"><a href="{{ $applicant->website }}">{{ $applicant->website }}</a></td>
			
			{{-- Display first applicant skill --}}
			<td>{{ $applicant->skills->first()->name }}</td>			
			<td rowspan="{{ $applicant->skills->count() }}">{{ $applicant->cover_letter }}</td>
		</tr>
			
			{{-- Slice skills on first element to avoid displaying first skill twice and display remaining skills --}}			
			@foreach($applicant->skills->slice(1) as $skill)
			<tr>
				<td>{{ $skill->name }}</td>
			</tr>
			@endforeach
		@endforeach
	<!-- /{{ $job->name }} -->
	@endforeach	
	</tbody>		
	<tfoot>
		<tr>
			
			{{-- Display applicant and unique skill count. See ShareController@show --}}
			<td colspan="6">{{ $applicants->count() }} Applicants, {{ $skill_count }} Unique Skills</td>
		</tr>
	</tfoot>
</table>
@endsection