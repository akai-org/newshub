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
    return [
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make('qwerty123'), // secret
        'image' => $faker->imageUrl(200, 200),
        'firstname' => $faker->firstName(),
        'lastname' => $faker->lastName,
        'remember_token' => str_random(10),
    ];
});
