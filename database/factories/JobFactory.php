<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Models\Job::class, function (Faker $faker) {
    return [
		'name' => $faker->jobTitle,
		'description' => $faker->paragraphs(3, true),		
    ];
});
