<?php

use Faker\Generator as Faker;

$factory->define(App\Register::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'telephone' => '(21) 994282445',
        'unit_id' => 1,
        'slot' => rand(1,5),
    ];
});
