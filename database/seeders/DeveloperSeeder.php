<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeveloperSeeder extends Seeder
{
    public function run()
    {
        DB::table('developers')->insert([
            [
                'developer_name' => 'From Software',
                'genre' => 'Souls',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'developer_name' => 'CD Projekt RED',
                'genre' => 'RPG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'developer_name' => 'Bethesda Game Studios',
                'genre' => 'RPG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'developer_name' => 'Game Science',
                'genre' => 'RPG, Fantasy',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
