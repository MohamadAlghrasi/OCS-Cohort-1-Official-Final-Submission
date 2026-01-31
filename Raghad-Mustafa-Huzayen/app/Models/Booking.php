<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'game_id',
        'reserved_by_name',
        'email',
        'phone',
        'number_of_players',
        'total_price',
        'payment_method',
        'special_requests',
        'status',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}