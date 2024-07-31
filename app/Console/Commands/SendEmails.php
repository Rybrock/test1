<?php

namespace App\Console\Commands;

use App\Mail\SubscriberEmail;
use App\Models\Subscriber;
use App\Models\Game;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendEmails extends Command
{
    /**
     *
     * @var string
     */
    protected $signature = 'app:send-emails {subscriber : The ID of the subscriber} {game_id : The ID of the game}';

    /**
     *
     * @var string
     */
    protected $description = 'Send a marketing email to a subscriber if the game release date is within 3 months';

    /**
     */
    public function handle()
    {
        // Get the subscriber and game IDs from the command - needs R&D
        $subscriberId = $this->argument('subscriber');
        $gameId = $this->argument('game_id');

        // Find the subscriber by ID
        $subscriber = Subscriber::find($subscriberId);

        if (!$subscriber) {
            $this->error("Subscriber with ID {$subscriberId} not found.");
            return;
        }

        // Find the game by ID
        $game = Game::find($gameId);

        if (!$game) {
            $this->error("Game with ID {$gameId} not found.");
            return;
        }

        // Check if the release date is within the next 3 months from now
        $releaseDate = Carbon::parse($game->release_date);
        $today = Carbon::today();
        $threeMonthsFromToday = $today->copy()->addMonths(3);

        if ($releaseDate->between($today, $threeMonthsFromToday)) {
            // Send the email if so
            Mail::to($subscriber->email)->send(new SubscriberEmail($subscriber->name));
            $this->info("Email sent to subscriber with ID {$subscriberId}");
            // game more than 3 months from release, no email sent
        } else {
            $this->info("No email sent. Game release date is not within the next 3 months.");
        }
    }
}
