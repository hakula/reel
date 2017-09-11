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
	    // Skip if user already exists
	    if(empty(User::where('email', config('data.user.email'))->first())) {    
		    // Create user with hardcoded email to attach provided test data to
		    $user = factory(User::class)->make([			    
			    'name' => config('data.user.name'),
			    'email' => config('data.user.email')
		    ]);
		    
		    $user->save();
		    
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
}
