<?php

use App\Models\Applicant;
use App\Models\Job;
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
			    $job->applicants()->saveMany(factory(Applicant::class, rand(5, 10))->make());
		    });		    
	    });
    }
}
