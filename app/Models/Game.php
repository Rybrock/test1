<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $table = 'games';

    protected $fillable = [
        'title',
        'release_date',
        'developer_team',
        'rating',
        'times_listed',
        'number_of_reviews',
        'genres',
        'summary',
        'reviews',
        'developer_id',
    ];

    protected $casts = [
        'release_date' => 'date'
    ];

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

    public function subscribers()
    {
        return $this->belongsToMany(Subscriber::class, 'game_subscriber', 'game_id', 'subscriber_id');
    }

    public function gameEvents()
    {
        return $this->belongsToMany(GameEvents::class, 'game_event_game', 'game_id', 'game_event_id');
    }
}
