<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'title' => $faker->text,
        'author_id' => rand(1,400),
        'description' => $faker->realText(500),
        'price' => $faker->randomFloat(2,50,300),
        'pages' => rand(100,1000),
        'category_id' => rand(1,40)
    ];
});
