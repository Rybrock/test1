<?php

namespace App\Models;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;
    protected $table = 'subscribers';

    protected $fillable = [
        'name',
        'email',
        'address',
        'location',
        'game_id'
    ];

    public function games()
    {
        return $this->belongsToMany(Game::class, 'game_subscriber');
    }
}
