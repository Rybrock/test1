<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Developer;
use Goutte\Client;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $client = new Client();

        // URL of the website to scrape
        $url = 'https://rawg.io/developers/valve-software';

        // Request the page
        $crawler = $client->request('GET', $url);
        // Scrape the data
        $crawler->filter('.developer-card')->each(function ($node) {
            // Extract developer name
            $developerName = $node->filter('.developer-name')->text();

            // Output the developer name for debugging
            $this->command->info("Scraping developer: $developerName");
            dd($developerName);

            // Create or update the developer in the database
            Developer::updateOrCreate(
                ['developer_name' => $developerName], // Unique identifier
                [
                    // 'email' => $email,
                    // 'developer_address' => $address,
                    // 'developer_location' => $location,
                    // 'lead_developer' => $leadDeveloper,
                    // 'genre' => $genre,
                    // 'is_active' => $isActive,
                    // 'first_published_game' => $firstPublished,
                    // 'last_published_game' => $lastPublished,
                ]
            );
        });
    }
}
