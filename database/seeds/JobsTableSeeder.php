<?php

use App\Models\Job;
use App\Models\User;
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
			    $user->jobs()->saveMany(factory(Job::class, rand(5, 10))->make());
		    });		    
	    });
		
    }
}
