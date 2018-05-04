<?php

use Faker\Generator as Faker;

$factory->define(ShareMarketGame\Holding::class, function (Faker $faker) {
    return [
        'nickname' => function () {
            return factory(ShareMarketGame\TradingAccount::class)->create()->nickname;
        },
        'code' => Share::orderByRaw("RAND()")->first(),
        'quantity' => $faker->randomDigitNotNull,
    ];
});
