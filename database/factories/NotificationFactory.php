<?php

use Faker\Generator as Faker;

$factory->define(ShareMarketGame\Notification::class, function (Faker $faker) {
    return [
        'nickname' => function () {
            return factory(ShareMarketGame\TradingAccount::class)->create()->nickname;
        },
        'message' => $faker->text($maxNbChars = 20),
    ];
});
