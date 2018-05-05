<?php

use Faker\Generator as Faker;

$factory->define(ShareMarketGame\Friend::class, function (Faker $faker) {
    return [
        'nickname' => function () {
            return factory(ShareMarketGame\TradingAccount::class)->create()->nickname;
        },
        'friend' => function () {
            return factory(ShareMarketGame\TradingAccount::class)->create()->nickname;
        },
    ];
});
