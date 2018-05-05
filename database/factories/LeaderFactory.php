<?php

use Faker\Generator as Faker;
use ShareMarketGame\Leader;


/* Autoincrement code given by laracast user 'usman'
 * see https://laracasts.com/discuss/channels/laravel/model-factory-increment-value-faker?page=1
 */
$autoIncrement= autoIncrement();

$factory->define(ShareMarketGame\Leader::class, function (Faker $faker) use ($autoIncrement) {
	$autoIncrement->next();
    return [
        'place' => $autoIncrement->current(),
        'nickname' => function () {
            return factory(ShareMarketGame\TradingAccount::class)->create()->nickname;
        },
        'date' => $faker->dateTime($max = 'now', $timezone = null),
        'trading_value' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 10000000),
    ];
});

function autoIncrement()
{
    for ($i = 0; $i < 1000; $i++) {
        yield $i;
    }
}
