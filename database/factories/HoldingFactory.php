<?php

use Faker\Generator as Faker;
use ShareMarketGame\Share;

$factory->define(ShareMarketGame\Holding::class, function (Faker $faker) {
    return [
        'trading_nickname' => function () {
            return factory(ShareMarketGame\TradingAccount::class)->create()->nickname;
        },
        'asx_code' => Share::whereNotNull('code')->orderByRaw("RAND()")->first(),
        'quantity' => $faker->randomDigitNotNull,
    ];
});
