<?php

use App\Models\Job;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    User::chunk(50, function($users) {		    
		    $users->each(function($user) {
			    // Create jobs and set an artificial creation date 
			    $jobs = factory(Job::class, rand(2, 5))->make()
			    	->each(function ($job) {
				    	$job->created_at = Carbon::now()->subDays(rand(0, 60))
				    		->subMinutes(rand(1, 600))
				    		->subSeconds(rand(0, 60)); 
				    });
			    
			    // Store jobs
			    $user->jobs()->saveMany($jobs);
		    });		    
	    });
		
    }
}
