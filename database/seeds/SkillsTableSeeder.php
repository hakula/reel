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
			    $applicant->skills()->saveMany(factory(Skill::class, rand(5, 10))->make());
		    });		    
	    });
    }
}
