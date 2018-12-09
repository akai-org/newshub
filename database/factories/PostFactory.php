<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->text(115),
        'description' => $faker->text(200),
        'url' => $faker->url,
        //'image' => 'https://www.wykop.pl/cdn/c2526412/no-picture,w207h139.jpg',
        'image' => $faker->imageUrl(300,250),
    ];
});
