<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Team;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'lead' => $faker->name
    ];
});
