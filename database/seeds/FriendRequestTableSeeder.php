<?php

use Illuminate\Database\Seeder;

class FriendRequestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ShareMarketGame\FriendRequest::class, 50)->create()->each(function ($u) {
            //$u->posts()->save(factory(ShareMarketGame\Post::class)->make());
        });
    }
}
