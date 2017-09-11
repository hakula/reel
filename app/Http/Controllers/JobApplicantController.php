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
	    // Create applicant so that we can attach skills
	    $applicant = $job->applicants()->create($request->input('attributes'));
	    
	    // Split text into array of skills using new line
		$skills = str_replace("\r", '', $request->input('skills'));
		
		// Attach each skill to applicant
	    foreach(explode(PHP_EOL, $skills) as $skill) {
		    $applicant->skills()->create(['name' => $skill]);
	    }	    
	    
	    // Set status message and redirect back to job page/form
	    return redirect(sprintf('jobs/%s', $job->id))->with('status', "Thank you for applying! We'll review your application and contact you if we feel an interview would be appropriate.");
    }
}
