<?php

use Illuminate\Database\Seeder;

class StartingWorthTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ShareMarketGame\StartingWorth::class, 50)->create()->each(function ($u) {
            //$u->posts()->save(factory(ShareMarketGame\Post::class)->make());
        });
    }
}
