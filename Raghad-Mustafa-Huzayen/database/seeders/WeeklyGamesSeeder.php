<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\WeeklyGame;

class WeeklyGamesSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        // Clear existing data
        WeeklyGame::truncate();
        
        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Add weekly games
        $games = [
            [
                'day' => 'Sunday',
                'time' => '19:00:00',
                'location' => 'International Academy-Amman',
                'max_players' => 36,
                'current_players' => 15,
                'is_active' => true,
            ],
            [
                'day' => 'Tuesday',
                'time' => '19:00:00',
                'location' => 'International Academy-Amman',
                'max_players' => 36,
                'current_players' => 18,
                'is_active' => true,
            ],
            [
                'day' => 'Thursday',
                'time' => '19:00:00',
                'location' => 'International Academy-Amman',
                'max_players' => 36,
                'current_players' => 22,
                'is_active' => true,
            ],
            [
                'day' => 'Friday',
                'time' => '20:00:00',
                'location' => 'International Academy-Amman',
                'max_players' => 36,
                'current_players' => 25,
                'is_active' => true,
            ],
            [
                'day' => 'Friday',
                'time' => '18:00:00',
                'location' => 'Islamic Educational College',
                'max_players' => 36,
                'current_players' => 20,
                'is_active' => true,
            ],
        ];

        foreach ($games as $game) {
            WeeklyGame::create($game);
        }

        echo "✅ Weekly games added successfully!\n";
    }
}