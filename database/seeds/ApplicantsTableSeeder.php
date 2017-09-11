<?php

use App\Models\Applicant;
use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ApplicantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Job::chunk(50, function($jobs) {
		    $jobs->each(function($job) {
			    // Create applicants and set an artificial creationg date
			    $applicants = factory(Applicant::class, rand(2, 5))->make()
			    	->each(function ($applicant) use ($job) {				    	
				    	// Add random number of days from jobs creation date
				    	$created_at = $job->created_at->copy()->addDays(rand(1, 15))->addMinutes(rand(0, 300))->addSeconds(rand(0, 60));
				    	
				    	// Set creation date to now if created_at is in the future
				    	$applicant->created_at = $created_at->gt(Carbon::now()) ? Carbon::now() : $created_at;
				    });
				
				// Store applicants
			    $job->applicants()->saveMany($applicants);
		    });		    
	    });
    }
}
