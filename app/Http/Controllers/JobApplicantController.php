<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Job;
use Illuminate\Http\Request;

class JobApplicantController extends Controller
{
    /**
     * Store a newly created job in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Job $job)
    {
	    $applicant = $job->applicants()->create($request->input('attributes'));
	    
		$skills = str_replace("\r", '', $request->input('skills'));
		
	    foreach(explode(PHP_EOL, $skills) as $skill) {
		    $applicant->skills()->create(['name' => $skill]);
	    }
	    
	    return redirect(sprintf('jobs/%s', $job->id));
    }
}
