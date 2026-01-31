<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivateGameRequest extends Model
{
    use HasFactory;

    protected $table = 'private_game_requests';
    
    protected $fillable = [
        'contact_name',
        'phone',
        'email',
        'preferred_date',
        'preferred_time',
        'venue',
        'duration',
        'total_players',
        'skill_level',
        'player_names',
        'additional_info',
        'status',
        'admin_notes'
    ];
    
    protected $casts = [
        'preferred_date' => 'date',
        'preferred_time' => 'string' 
    ];
}