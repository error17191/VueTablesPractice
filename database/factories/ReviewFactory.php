<?php

use Faker\Generator as Faker;

$factory->define(App\Review::class, function (Faker $faker) {
    return [
        'review' => $faker->realText(),
        'user_id' => rand(1,2000),
        'book_id' => rand(1,500),
        'stars' => rand(1,5),
    ];
});
