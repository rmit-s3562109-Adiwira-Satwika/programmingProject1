<?php

use Faker\Generator as Faker;

$factory->define(ShareMarketGame\Transaction::class, function (Faker $faker) {
    return [
        'nickname' => function () {
            return factory(ShareMarketGame\TradingAccount::class)->create()->nickname;
        },
        'code' => Share::orderByRaw("RAND()")->first(),
        'amount' => $faker->randomDigitNotNull,
        'value' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 10000000),,
        'purchase' => numberBetween($min = 0, $max = 1),
        'dateTime' => $faker->dateTime($max = 'now', $timezone = null),
    ];
});
