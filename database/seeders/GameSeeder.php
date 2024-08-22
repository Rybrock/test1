<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    public function run()
    {
        // Retrieve developer IDs
        $fromSoftwareId = DB::table('developers')->where('developer_name', 'From Software')->value('id');
        $cdProjektRedId = DB::table('developers')->where('developer_name', 'CD Projekt RED')->value('id');
        $bethesdaGameStudiosId = DB::table('developers')->where('developer_name', 'Bethesda Game Studios')->value('id');
        $gameScienceId = DB::table('developers')->where('developer_name', 'Game Science')->value('id');

        // Insert games
        DB::table('games')->insert([
            [
                'title' => 'Elden Ring',
                'release_date' => Carbon::createFromFormat('d-m-Y', '25-02-2022'),
                'developer_team' => 'From Software',
                'rating' => 4.5,
                'times_listed' => 100,
                'number_of_reviews' => 20,
                'genres' => 'Action',
                'summary' => 'Very difficult game however very rewarding if you are persistent.',
                'reviews' => 'Positive reviews.',
                'developer_id' => $fromSoftwareId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Demon Souls',
                'release_date' => Carbon::createFromFormat('d-m-Y', '12-12-2020'),
                'developer_team' => 'From Software',
                'rating' => 4.5,
                'times_listed' => 100,
                'number_of_reviews' => 20,
                'genres' => 'Action',
                'summary' => 'Very difficult game however very rewarding if you are persistent.',
                'reviews' => 'Positive reviews.',
                'developer_id' => $fromSoftwareId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Cyberpunk 2077',
                'release_date' => Carbon::createFromFormat('d-m-Y', '10-12-2020'),
                'developer_team' => 'CD Projekt RED',
                'rating' => 3.8,
                'times_listed' => 250,
                'number_of_reviews' => 50,
                'genres' => 'Open World',
                'summary' => 'A futuristic open-world RPG with a complex narrative, marred by technical issues at launch.',
                'reviews' => 'Mixed reviews.',
                'developer_id' => $cdProjektRedId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Witcher 3: Wild Hunt',
                'release_date' => Carbon::createFromFormat('d-m-Y', '18-05-2015'),
                'developer_team' => 'CD Projekt RED',
                'rating' => 3.8,
                'times_listed' => 250,
                'number_of_reviews' => 50,
                'genres' => 'RPG',
                'summary' => 'A gory take on a successful Polish book series.',
                'reviews' => 'Mixed reviews.',
                'developer_id' => $cdProjektRedId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Fallout 4',
                'release_date' => Carbon::createFromFormat('d-m-Y', '10-11-2015'),
                'developer_team' => 'Bethesda Game Studios',
                'rating' => 4,
                'times_listed' => 350,
                'number_of_reviews' => 30,
                'genres' => 'Action',
                'summary' => 'A futuristic open-world RPG with a complex narrative, marred by technical issues at launch.',
                'reviews' => 'Amazing reviews.',
                'developer_id' => $bethesdaGameStudiosId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Black Myth: Wukong',
                'release_date' => Carbon::createFromFormat('d-m-Y', '20-08-2024'),
                'developer_team' => 'Game Science',
                'rating' => 5,
                'times_listed' => 10,
                'number_of_reviews' => 100,
                'genres' => 'RPG',
                'summary' => 'A fantasy action epic.',
                'reviews' => 'Amazing reviews.',
                'developer_id' => $gameScienceId,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
