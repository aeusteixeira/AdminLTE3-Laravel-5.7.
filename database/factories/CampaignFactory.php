<?php

use Faker\Generator as Faker;

$factory->define(App\Campaign::class, function (Faker $faker) {
    $title =$faker->title;
    return [
        'name_private' => $title,
        'description_private' => $faker->paragraph,
        'name_public' => $title,
        'information_public' => $faker->paragraph,
        'slug' => str_slug($title),
        'default_whatsapp_message' => $faker->paragraph,
        'default_email_message' => $faker->paragraph,
        'layout_id' => 1,
        'template_id' => 1,
        'user_id' => 1,
    ];
});
