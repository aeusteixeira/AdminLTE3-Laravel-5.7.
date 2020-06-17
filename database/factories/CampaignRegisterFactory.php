<?php
use App\CampaignRegister;
use Faker\Generator as Faker;

$factory->define(CampaignRegister::class, function (Faker $faker) {
    return [
        'register_id' => function(){
            return App\Register::all()->random()->id;
        },
        'campaign_id' => function(){
            return App\Campaign::all()->random()->id;
        }
    ];
});
