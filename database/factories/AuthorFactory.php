<?php

use Faker\Generator as Faker;

$factory->define(\App\Author::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'country_id' => rand(1,50)
    ];
});
