<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subscriber;

class SubscriberSeeder extends Seeder
{
    public function run()
    {
        Subscriber::create([
            'name' => 'Ryan Brockley',
            'email' => 'ry@ymail.com',
            'address' => 'Hindley, Wigan',
            'location' => 'U.K',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
