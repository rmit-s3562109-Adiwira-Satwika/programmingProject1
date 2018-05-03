<?php

use Faker\Generator as Faker;

$factory->define(ShareMarketGame\TradingAccount::class, function (Faker $faker) {
    return [
        
        'nickname' => $faker->name,
        'balance' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 10000000),
        'user_id' => function () {
            return factory(ShareMarketGame\User::class)->create()->id;
        },
    ];
});
