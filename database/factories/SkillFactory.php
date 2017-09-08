<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
		'name' => collect(config('skills'))->random(),
    ];
});
