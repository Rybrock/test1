<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    protected $fillable = [
        'developer_name',
        'genre',
    ];

    public function games()
    {
        return $this->hasMany(Game::class);
    }

    public function gameEvents()
    {
        return $this->belongsToMany(GameEvents::class, 'game_event_developer', 'developer_id', 'game_event_id');
    }
}
