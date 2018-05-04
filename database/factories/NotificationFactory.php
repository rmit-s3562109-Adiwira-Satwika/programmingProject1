<?php

use Faker\Generator as Faker;

$factory->define(ShareMarketGame\Notification::class, function (Faker $faker) {
    return [
        'nickname' => function () {
            return factory(ShareMarketGame\TradingAccount::class)->create()->nickname;
        },
        'message' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true)
    ];
});
