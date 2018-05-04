<?php

use Illuminate\Database\Seeder;

class HoldingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ShareMarketGame\Holding::class, 50)->create()->each(function ($u) {
            $u->posts()->save(factory(ShareMarketGame\Post::class)->make());
        });
    }
}
