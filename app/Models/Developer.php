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
}
