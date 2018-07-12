<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Customer::class, function (Faker $faker) {
    return [
        'title'      => $faker->title,
        'first_name' => $faker->name,
        'last_name'  => $faker->name,
        'email'      => $faker->unique()->safeEmail,
    ];
});
