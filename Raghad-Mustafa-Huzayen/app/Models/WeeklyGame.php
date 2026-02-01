<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyGame extends Model
{
    use HasFactory;

    protected $table = 'weekly_games';
    
    protected $fillable = [
        'day',
        'time',
        'location',
        'max_players',
        'current_players',
        'is_active'
    ];
    
    protected $casts = [
        'time' => 'datetime',
        'is_active' => 'boolean'
    ];
}