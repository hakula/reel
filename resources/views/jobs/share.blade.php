<!DOCTYPE html>
<html>
	<head>
		<title>Job Applicants Report</title>
		<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.9.1/build/cssreset/cssreset-min.css">
		<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.9.1/build/cssbase/cssbase-min.css">
		<style type="text/css">
			#page {
				width: 1200px;
				margin: 30px auto;
			}
			.job-applicants {
				width: 100%;
			}
			.job-name {
				text-align: center;
			}
			.applicant-name {
				width: 150px;
			}
		</style>
	</head>
	<body>
		<div id="page">
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
				@foreach($user->jobs as $job) 
				<!-- {{ $job->name }} -->
					@foreach($job->applicants as $applicant)
					<tr>						
						@if($loop->first)
						<td rowspan="{{ $job->skills->count() }}" class="job-name">{{ $job->name }}</td>
						@endif
						<td rowspan="{{ $applicant->skills->count() }}" class="applicant-name">{{ $applicant->name }}</td>
						<td rowspan="{{ $applicant->skills->count() }}"><a href="mailto:{{ $applicant->email }}">{{ $applicant->email }}</a></td>
						<td rowspan="{{ $applicant->skills->count() }}"><a href="{{ $applicant->website }}">{{ $applicant->website }}</a></td>
						<td>{{ $applicant->skills->first()->name }}</td>
						<td rowspan="{{ $applicant->skills->count() }}">{{ $applicant->cover_letter }}</td>
					</tr>
						@foreach($applicant->skills as $skill) @if(!$loop->first)
						<tr>
							<td>{{ $skill->name }}</td>
						</tr>
						@endif @endforeach
					@endforeach
				<!-- /{{ $job->name }} -->
				@endforeach
				
				</tbody>		
				<tfoot>
					<tr>
						<td colspan="6">{{ $user->applicants->count() }} Applicants, {{ $user->jobs->pluck('skills')->flatten()->pluck('name')->unique()->count() }} Unique Skills</td>
					</tr>
				</tfoot>
			</table>
		</div>
	</body>
</html>
	
