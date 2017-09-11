@extends('layouts.main')

@section('main')	
<div class="page-header">
	<h1>
		Jobs 
		<span class="pull-right">
			<a class="btn btn-success" href="/users/{{ Auth::user()->id }}/jobs/create"><i class="fa fa-newspaper-o" aria-hidden="true"></i> New</a>
			<a class="btn btn-default" href="#modal-share" data-toggle="modal"><i class="fa fa-share-alt" aria-hidden="true"></i> Share</a>
		</span>
	</h1>
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

<div class="modal fade" id="modal-share" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id=""><i class="fa fa-share-alt" aria-hidden="true"></i> Share Jobs</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Link to share</label>
					<input class="form-control" type="text" value="{{ url(sprintf('/shares/%s', $user->guid)) }}" onclick="this.select();">
				</div>
			</div>			
		</div>
	</div>
</div>