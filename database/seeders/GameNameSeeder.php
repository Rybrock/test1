<?php

namespace Database\Seeders;

use App\Models\Game;
use Goutte\Client;
use Illuminate\Database\Seeder;

class GameNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $client = new Client();

        // URL of the website to scrape
        $url = 'https://rawg.io/games';

        // Request the page
        $crawler = $client->request('GET', $url);

        // Scrape game names
        $crawler->filter('.game-name')->each(function ($node) {
            $gameName = $node->text();

            // For testing, just output the game names
            $this->command->info($gameName);

            Game::create(['game_name' => $gameName]);
        });
    }
}
