<?php

use Faker\Generator as Faker;
use SHareMarketGame\Share;

$factory->define(ShareMarketGame\Transaction::class, function (Faker $faker) {
    return [
        'nickname' => function () {
            return factory(ShareMarketGame\TradingAccount::class)->create();
        },
        'code' => Share::whereNotNull('code')->orderByRaw("RAND()")->first(),
        'amount' => $faker->randomDigitNotNull,
        'value' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 10000000),
        'purchase' => $faker->numberBetween($min = 0, $max = 1),
        'dateTime' => $faker->dateTime($max = 'now', $timezone = null),
    ];
});
