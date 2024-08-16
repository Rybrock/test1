<?php

namespace App\Console\Commands;

use App\Jobs\SendSubscriberEmails;
use App\Models\Game;
use App\Models\Subscriber;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-emails'; // Removed subscriber and game_id from the signature

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send marketing emails to subscribers if their subscribed games have a release date within 3 months';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get the current date and the date 3 months from now
        $today = Carbon::today();
        $threeMonthsFromToday = $today->copy()->addMonths(3);

        // Find all games that are releasing within the next 3 months
        $games = Game::whereBetween('release_date', [$today, $threeMonthsFromToday])->get();

        if ($games->isEmpty()) {
            $this->info("No games found with release dates within the next 3 months.");
            return;
        }
        foreach ($games as $game) {
            // Find all subscribers associated with the game
            $subscribers = $game->subscribers;

            foreach ($subscribers as $subscriber) {
                // Dispatch the job with a delay of 1 minute
                SendSubscriberEmails::dispatch($subscriber, $game)->delay(now()->addMinute());

                $this->info("Email job dispatched with a 1-minute delay to subscriber with ID {$subscriber->id} for game {$game->id}");
            }
        }
    }
}
