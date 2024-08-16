<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Developer;

class DevelopersTableSeeder extends Seeder
{
    public function run()
    {
        Developer::factory()->count(100)->create();
    }
}

