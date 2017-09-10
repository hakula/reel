@extends('layouts.main')

@section('main')	
<div class="page-header">
	<h1>Jobs <small><a class="btn" href="/users/{{ Auth::user()->id }}/jobs/create">Add New</a></small></h1>
</div>
<div class="panel panel-default">	            
	<table class="table">
	    <thead>
	        <tr>
	            <th>Name</th>
	            <th class="text-center">Applicants</th>		                    
	            <th class="text-center">Date</th>		                    
	        </tr>
	    </thead>
	    <tbody>
			@foreach($jobs as $job)
			<tr>
				<td><a href="/users/{{ Auth::user()->id }}/jobs/{{ $job->id }}">{{ $job->name }}</a></td>
				<td class="text-center">{{ $job->applicants->count() }}</td>
				<td class="text-center">{{ $job->created_at->diffForHumans() }}</td>							
			</tr>
			@endforeach
	    </tbody>
	</table>
</div>
{{ $jobs->links() }}

@endsection
