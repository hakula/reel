<?php

use App\Models\Applicant;
use App\Models\Job;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Seeder;

class SampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $user = factory(User::class)->create();
	    
        foreach(config('data.jobs') as $job) {		
			$job = new Job($job);		
			$user->jobs()->save($job);
		}
	
		foreach(config('data.applicants') as $applicant) {
			Applicant::create($applicant);
		}
		
		foreach(config('data.skills') as $skill) {
			Skill::create($skill);
		}

    }
}
