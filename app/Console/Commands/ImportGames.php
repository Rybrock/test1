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
        $developerName = $record['Team'] ?? null;
        $developerGenre = $record['Genres'] ?? null;
        if (!$developerName) {
            $this->error("Developer name is missing for game '{$record['Title']}'.");
            return;
        }

        $developer = Developer::firstOrCreate(
            [
                'developer_name' => $developerName,
                'genre' => $developerGenre
            ],
        );


        $gameData = [
            'title' => $record['Title'] ?? null,
            'release_date' => $this->formatDate($record['Release Date'] ?? null),
            'developer_team' => $developerName,
            'rating' => $this->sanitizeDecimal($record['Rating'] ?? null),
            'times_listed' => $this->sanitizeInteger($record['Times Listed'] ?? null),
            'number_of_reviews' => $this->sanitizeInteger($record['Number of Reviews'] ?? null),
            'genres' => $this->formatTextField($record['Genres'] ?? ''),
            'summary' => $record['Summary'] ?? null,
            'reviews' => $this->formatTextField($record['Reviews'] ?? ''),
            'developer_id' => $developer->id,
        ];

        Game::create($gameData);
    }

    private function formatDate($date)
    {
        if (!$date) {
            return null;
        }

        try {
            return Carbon::createFromFormat('M d, Y', $date)->format('Y-m-d');
        } catch (\Exception $e) {
            $this->error("Invalid date format: $date");
            return null;
        }
    }

    private function sanitizeDecimal($value)
    {
        return is_numeric($value) ? (float) $value : null;
    }

    private function sanitizeInteger($value)
    {
        return is_numeric($value) ? (int) $value : null;
    }

    private function formatTextField($field)
    {
        return $field ? implode(', ', array_map('trim', explode(',', $field))) : null;
    }
}
