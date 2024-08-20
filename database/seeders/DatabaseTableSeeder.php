<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Developer;
use App\Models\Game;
use App\Models\Subscriber;

class DatabaseTableSeeder extends Seeder
{
    public function run()
    {
        // Seed developers
        Developer::factory()->count(100)->create();

        // Seed games
        Game::factory()->count(50)->create();

        // Seed subscribers
        Subscriber::factory()->count(200)->create();
    }
}
