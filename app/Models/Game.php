<?php

namespace App\Models;

use App\Models\Developer;
use App\Models\Subscriber;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $table = 'games';

    protected $fillable = [
        'game_name',
        'genre',
        'platforms',
        'game_origin',
        'meta_critic_score',
        'out_now',
        'audience',
        'online_stores',
        'collectors_edition',
        'release_date',
        'developer_id',
        'subscriber_id'
    ];

    protected $casts = [
        'release_date' => 'date',
        'out_now' => 'boolean',
    ];

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

    public function subscriber()
    {
        return $this->belongsTo(Subscriber::class);
    }

}
