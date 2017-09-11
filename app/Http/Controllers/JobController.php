<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
	/**
     * Display a listing of user jobs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		return view('jobs.list', [			
			'jobs' => Job::orderBy('created_at', 'desc')->paginate(10)
		]);
    }
    	
    /**
     * Display the specified job and applicant form.
     *
     * @param  \App\Models\Job $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
		return view('jobs.show', [
			'job' => $job,
		]);
    }
}
