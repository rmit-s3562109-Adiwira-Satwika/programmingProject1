<?php

use Illuminate\Database\Seeder;

class TradingAccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ShareMarketGame\TradingAccount::class, 50)->create()->each(function ($u) {
            //$u->posts()->save(factory(ShareMarketGame\Post::class)->make());
        });
    }
}
