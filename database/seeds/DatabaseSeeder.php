<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ShareCodesSeeder::class,
            UserTableSeeder::class,
            TradingAccountTableSeeder::class,
            FriendRequestTableSeeder::class,
            FriendTableSeeder::class,
            HoldingTableSeeder::class,
            LeaderTableSeeder::class,
            NotificationTableSeeder::class,
            StartingWorthTableSeeder::class,
            TransactionTableSeeder::class,
        ]);

    }
}
