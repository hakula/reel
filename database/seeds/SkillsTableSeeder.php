<?php

use App\Models\Applicant;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{	
	
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Applicant::chunk(50, function($applicants) {
		    $applicants->each(function($applicant) {
			    // Only add data to users other than sample data user
			    if($applicant->job->user->email != config('data.user.email')) {
				    $applicant->skills()->saveMany(factory(Skill::class, rand(2, 3))->make());
			    }			    
		    });		    
	    });
    }
}
