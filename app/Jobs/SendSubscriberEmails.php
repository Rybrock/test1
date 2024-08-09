<?php

namespace App\Jobs;

use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriberEmail;

class SendSubscriberEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $subscriber;
    protected $game;

    /**
     * Create a new job instance.
     *
     * @param \App\Models\Subscriber $subscriber
     * @param \App\Models\Game $game
     * @return void
     */
    public function __construct($subscriber, $game)
    {
        $this->subscriber = $subscriber;
        $this->game = $game;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Send email with the subscriber's name and the game's title
        Mail::to($this->subscriber->email)->send(new SubscriberEmail($this->subscriber->name, $this->game->title));
    }
}
