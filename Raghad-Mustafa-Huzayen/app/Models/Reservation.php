<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'weekly_game_id',
        'reserved_by_name',
        'email',
        'phone',
        'number_of_players',
        'player_names',
        'payment_method',
        'status',
        'special_requests'
    ];

    protected $casts = [
        'player_names' => 'array'
    ];

    // Relationship with WeeklyGame
    public function weeklyGame()
    {
        return $this->belongsTo(WeeklyGame::class);
    }
}