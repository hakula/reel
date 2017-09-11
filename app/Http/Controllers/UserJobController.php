<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use Illuminate\Http\Request;
use League\Csv\Writer;
use SplTempFileObject;


class UserJobController extends Controller
{
	public function __construct()
	{
		// Protect routes
		$this->middleware('auth');
	}
	
    /**
     * Display a listing of user jobs.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
		return view('users.jobs.list', [
			'user' => $user,
			'jobs' => $user->jobs()->orderBy('created_at', 'desc')->paginate(5)
		]);
    }

    /**
     * Show the form for creating a new job.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
		return view('users.jobs.create', [
			'user' => $user,
		]);
    }

    /**
     * Store a newly created job in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobRequest $request, User $user)
    {	
	    // Store job
		$job = $user->jobs()->create($request->input('attributes'));
		
		// Go to new job page
		return redirect(sprintf('users/%s/jobs/%s', $user->id, $job->id));
    }

    /**
     * Display the specified job.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Job $job)
    {
		return view('users.jobs.show', [
			'user' => $user,
			'job' => $job,
			'applicants' => $job->applicants()->paginate(5),			
		]);
    }

    /**
     * Show the form for editing the specified job.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Job $job)
    {
		return view('users.jobs.edit', [
			'user' => $user,
			'job' => $job,
		]);
    }

    /**
     * Update the specified job in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobRequest $request, User $user, Job $job)
    {	    
	    // Update job
		$job->update($request->input('attributes'));
		
		// Go to job page
		return redirect(sprintf('users/%s/jobs/%s', $user->id, $job->id));
    }

    /**
     * Remove the specified job from storage.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Job $job)
    {
        //
    }
    
    public function export(User $user) 
    {
	    if (!ini_get("auto_detect_line_endings")) {
			ini_set("auto_detect_line_endings", '1');
		}

	    // Get csv writer
		$csv = Writer::createFromFileObject(new SplTempFileObject());
		
		// Insert header row
		$csv->insertOne([
			'Job', 
			'Applicant', 
			'Email Address', 
			'Website', 
			'Skills', 
			'Cover Letter', 
			'Date',
		]);
		
		$rows = [];
		
		// Loop through jobs and candidates and add to csv
		foreach($user->jobs()->orderBy('created_at', 'desc')->get() as $job) {
			$job->applicants()
				->orderBy('created_at', 'desc')
				->each(function($applicant) use (&$rows, $job) {
					$rows[] =[
						$job->name,
						$applicant->name,
						$applicant->email,
						$applicant->website,
						$applicant->skills->implode('name', ' ,'),
						$applicant->cover_letter,
						$applicant->created_at->format('M jS Y g:i:s A'),
					];
					
				});
		}
		
		// Insert all rows
		$csv->insertAll($rows);
		
		// Return downloadable file
		return $csv->output(sprintf('jobs-%s.csv', str_random()));
    }
}
