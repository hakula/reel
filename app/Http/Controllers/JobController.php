<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{   
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
