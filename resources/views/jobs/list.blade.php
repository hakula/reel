@extends('layouts.main')

@section('main')	
<!-- Header -->
<div class="page-header">
	<h1>
		Jobs 		
	</h1>
</div>
<!-- Paginated Jobs -->
<div class="panel panel-default">	            
	<div class="list-group">
		@foreach($jobs as $job)
		<div class="list-group-item">
			<a href="/jobs/{{ $job->id }}">{{ $job->name }}</a>
			<span class="pull-right">{{ $job->created_at->diffForHumans() }}</span>							
		</div>
		@endforeach
	</div>
</div>
{{ $jobs->links() }}

@endsection
