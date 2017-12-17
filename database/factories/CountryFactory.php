<?php

use Faker\Generator as Faker;

$factory->define(App\Country::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->country,
        'code' => $faker->unique()->countryCode,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude
    ];
});
