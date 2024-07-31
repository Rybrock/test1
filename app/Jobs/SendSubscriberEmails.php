<?php

namespace App\Jobs;

use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendSubscriberEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $subscriber;
    protected $game;

    /**
     * Create a new job instance.
     *
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
        // Send email logic
        Mail::to($this->subscriber->email)->send(new \App\Mail\SubscriberEmail($this->subscriber));
    }
}
