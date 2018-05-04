<?php

use Illuminate\Database\Seeder;

class TransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ShareMarketGame\Transaction::class, 50)->create()->each(function ($u) {
            $u->posts()->save(factory(ShareMarketGame\Post::class)->make());
        });
    }
}
