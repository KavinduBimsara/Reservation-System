<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Room::class, function (Faker $faker) {
    return [
        'room_no' => $faker->unique(),
        'name' => $faker->name,
        'description' => $faker->sentence,
        'slug' => $faker->sentence,
        'room_type_id' => function () {
            return factory('App\Models\RoomType')->create()->id;
        },
    ];
});
