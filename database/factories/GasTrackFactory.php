<?php

use Faker\Generator as Faker;

$factory->define(App\GasTrack::class, function (Faker $faker) {
    return [
        "user_id"       => null,
        "km_actual"     => $faker->numberBetween(0, 10000),
        "lts_add"       => $faker->randomFloat(2, 0, 20),
        "date"          => $faker->dateTime(),
        "price"         => $faker->randomFloat(2, 3, 5),
        "total"         => $faker->randomFloat(2, 20, 100),
        "km_lt"         => $faker->randomFloat(2, 0, 20),
        "wheeled"       => null,
        "total_wheeled" => $faker->randomFloat(2, 20, 1000),
        "saved"         => true,
    ];
});
