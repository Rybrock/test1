<?php

namespace App\Models;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;
    protected $table = 'developers';
    protected $fillable = [
        'developer_name',
        'email',
        'developer_address',
        'developer_location',
        'lead_developer',
        'genre',
        'is_active',
        'first_published_game',
        'last_published_game',
    ];

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
