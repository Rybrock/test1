<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseTableSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            DeveloperSeeder::class,
            GameSeeder::class,
            SubscriberSeeder::class,
        ]);
    }
}
