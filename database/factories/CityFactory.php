<?php

use Faker\Generator as Faker;

$factory->define(App\City::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->city,
        'country_id' => rand(1,50),
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude
    ];
});
