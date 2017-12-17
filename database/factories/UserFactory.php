<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'age' => rand(10,100),
        'job' => $faker->jobTitle,
        'title' => $faker->title(['Male','Female']),
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'country_id' => rand(1,50),
        'city_id' => rand(1,600),
        'company' => $faker->company,
        'website' => $faker->url,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});
