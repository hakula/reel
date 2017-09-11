<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Job;
use Illuminate\Http\Request;

class JobApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Job $job)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Job $job)
    {
		
    }

    /**
     * Store a newly created resource in storage.
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

    /**
     * Display the specified resource.
     *
     * @param  int  Job $job, Applicant $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job, Applicant $applicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Job $job, Applicant $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job, Applicant $applicant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Job $job, Applicant $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job, Applicant $applicant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Job $job, Applicant $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job, Applicant $applicant)
    {
        //
    }
}
