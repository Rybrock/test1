<?php

namespace App\Models;

use App\Models\Developer;
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
        'game_meta_score',
        'is_active',
        'rating',
        'first_published',
        'developer_id'
    ];

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

}
