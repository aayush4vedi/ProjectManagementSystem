<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'details' => $faker->sentence,
        'lead' => $faker->name
    ];
});
