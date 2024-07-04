<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $table = 'games';

    protected $fillable = [
        'game_name',
        'email',
        'game_address',
        'game_location',
        'game_meta_score'
    ];

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

}
