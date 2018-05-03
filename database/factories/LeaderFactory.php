<?php

use Faker\Generator as Faker;
use ShareMarketGame\Leader;

$factory->define(ShareMarketGame\Leader::class, function (Faker $faker) {
	$maxLeader=Leader::max('place');
	if($maxLeader->isEmpty()){
		$place=1;
	}else{
		$place=$maxLeader->id+1;
	}
    return [
        'place' => $place, 
        'nickname' => function () {
            return factory(ShareMarketGame\TradingAccount::class)->create()->nickname;
        },
        'date' => $faker->dateTime($max = 'now', $timezone = null),
        'trading_value' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 10000000),
    ];
});
