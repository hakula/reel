<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ShareController extends Controller
{
	/**
     * Display the jobs for a given user.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */	
	public function show(User $user) 
	{
		// Retrieve all jobs with their accompanying skills 		
		// then flatten returned collection of collections, 
		// pull skill name values, remove duplicates and return count
		// ($jobs->skills is obtained through joining skills table with applicants and constraing on applicants.job_id)		
		$skill_count = $user->jobs
			->pluck('skills')
			->flatten()
			->pluck('name')
			->unique()
			->count();
		
		return view('jobs.share', [
			'user' => $user,
			'jobs' => $user->jobs,
			'applicants' => $user->applicants,
			'skill_count' => $skill_count,
		]);
	}
}