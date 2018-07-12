<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\RoomType::class, function (Faker $faker) {
    return [
        'name'        => $faker->name,
        'description' => $faker->sentence,
        'capacity'    => $faker->randomNumber(),
    ];
});
