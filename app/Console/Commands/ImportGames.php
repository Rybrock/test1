<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Game;
use App\Models\Developer;
use Illuminate\Support\Facades\File;
use League\Csv\Reader;
use Carbon\Carbon;

class ImportGames extends Command
{
    protected $signature = 'import:games {file}';
    protected $description = 'Import games from a CSV file and save them to the database';

    public function handle()
    {
        // path tp storage folder in repo
        $filePath = storage_path('game_imports/games.csv');
        $this->info("Checking file path: $filePath");

        if (!File::exists($filePath)) {
            $this->error("File does not exist at path: $filePath");
            return 1;
        }

        $csv = Reader::createFromPath($filePath, 'r');
        $csv->setHeaderOffset(0);

        foreach ($csv->getRecords() as $record) {
            $this->createGameAndDeveloperFromRecord($record);
        }

        $this->info('Games and developers have been successfully imported.');
        return 0;
    }

    private function createGameAndDeveloperFromRecord(array $record)
    {
        // check to see if the record exists
        $developerName = $record['Team'] ?? null;
        $developerGenre = $record['Genres'] ?? null;
        if (!$developerName) {
            $this->error("Developer name is missing for game '{$record['Title']}'.");
            return;
        }
        // create a developer
        $developer = Developer::firstOrCreate(
            [
                'developer_name' => $developerName,
                'genre' => $developerGenre
            ],
        );

        // map the data to create game
        $gameData = [
            'title' => $record['Title'] ?? null,
            'release_date' => $this->formatDate($record['Release Date'] ?? null),
            'developer_team' => $developerName,
            'rating' => $this->formatDecimal($record['Rating'] ?? null),
            'times_listed' => $this->formatInteger($record['Times Listed'] ?? null),
            'number_of_reviews' => $this->formatInteger($record['Number of Reviews'] ?? null),
            'genres' => $this->formatTextField($record['Genres'] ?? ''),
            'summary' => $record['Summary'] ?? null,
            'reviews' => $this->formatTextField($record['Reviews'] ?? ''),
            'developer_id' => $developer->id,
        ];

        Game::create($gameData);
    }

    // format date
    private function formatDate($date)
{
    if (!$date) {
        return null;
    }

    // Use a regular expression to validate if the date is in the correct format
    $pattern = '/^[A-Za-z]{3} \d{1,2}, \d{4}$/';
    if (!preg_match($pattern, $date)) {
        $this->error("Invalid date format: $date");
        return null;
    }

    // If the format is correct, proceed with parsing the date
    $formattedDate = Carbon::createFromFormat('M d, Y', $date);

    // If the date couldn't be parsed, return null
    if ($formattedDate === false) {
        $this->error("Failed to parse the date: $date");
        return null;
    }

    return $formattedDate->format('Y-m-d');
}

    // format rating
    private function formatDecimal($value)
    {
        return is_numeric($value) ? (float) $value : null;
    }

    // format times_listed and number_of_reviews
    private function formatInteger($value)
    {
        return is_numeric($value) ? (int) $value : null;
    }

    // format reviews
    private function formatTextField($field)
    {
        return $field ? implode(', ', array_map('trim', explode(',', $field))) : null;
    }
}
