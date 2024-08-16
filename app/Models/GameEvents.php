<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameEvents extends Model
{
    use HasFactory;

    protected $table = 'game_events';

    protected $fillable = [
        'name',
        'location',
        'platforms',
        'event_date',
    ];

    protected $casts = [
        'event_date' => 'date',
    ];

    public function games()
    {
        return $this->belongsToMany(Game::class, 'game_event_game', 'game_event_id', 'game_id');
    }

    public function developers()
    {
        return $this->belongsToMany(Developer::class, 'game_event_developer', 'game_event_id', 'developer_id');
    }

    public function subscribers()
    {
        return $this->belongsToMany(Subscriber::class, 'game_event_subscriber', 'game_event_id', 'subscriber_id');
    }
}
