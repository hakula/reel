<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
		'name' => $faker->name,
		'email' => $faker->email,
		'website' => $faker->url,
		'cover_letter' => $faker->paragraph(),
    ];
});
