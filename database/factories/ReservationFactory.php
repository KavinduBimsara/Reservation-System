<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Reservation::class, function (Faker $faker) {
    return [
        'reservation_number' => $faker->uuid,
        'customer_id' => function () {
            return factory(\App\Models\Customer::class)->create()->id;
        },
        'start_date' =>$faker->date(),
        'end_date' => $faker->date()
    ];
});
