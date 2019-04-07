<?php

use Faker\Generator as Faker;

$factory->define(App\Vote::class, function (Faker $faker) {
    return [
        "user_id"           => null,
        "origin"            => $faker->randomElement(['gas-track']),
        "stars"             => $faker->numberBetween(0, 5),
        "comment"           => $faker->paragraph(),
    ];
});
