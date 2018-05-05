<?php

use Faker\Generator as Faker;

$factory->define(ShareMarketGame\StartingWorth::class, function (Faker $faker) {
    return [
        'nickname' => function () {
            return factory(ShareMarketGame\TradingAccount::class)->create()->nickname;
        },
        'worth' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 10000000),
    ];
});
