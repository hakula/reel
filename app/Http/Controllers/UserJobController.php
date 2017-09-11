<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class UserJobController extends Controller
{
	public function __construct()
	{
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
    public function store(Request $request, User $user)
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
    public function update(Request $request, User $user, Job $job)
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
}
