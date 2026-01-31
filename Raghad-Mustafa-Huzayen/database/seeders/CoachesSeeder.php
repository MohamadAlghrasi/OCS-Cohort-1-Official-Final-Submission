<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Coach;

class CoachesSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        // Clear existing data
        Coach::truncate();
        
        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Add coaches data
        $coaches = [
            [
                'name' => 'Jaber Suleiman',
                'title' => 'Head Coach',
                'bio' => 'Jaber is passionate about community building and fair play. He ensures every game is safe and enjoyable for all players.',
                'experience' => '2 Years',
                'specialty' => 'Game Organization & Rules',
                'image' => 'coach1.jpg'
            ],
            [
                'name' => 'Baraa Suleiman',
                'title' => 'Coach',
                'bio' => 'Baraa focuses on creating a fun, safe environment for young players to learn dodgeball fundamentals.',
                'experience' => '2 Years',
                'specialty' => 'Coaching',
                'image' => 'coach2.jpg'
            ],
            [
                'name' => 'Mohammad Hayek',
                'title' => 'Coach',
                'bio' => 'Former competitive dodgeball player with 2 years of coaching experience.',
                'experience' => '2 Years',
                'specialty' => 'Coaching',
                'image' => 'coach3.jpg'
            ],
            [
                'name' => 'Ahmad Issa',
                'title' => 'Coach',
                'bio' => 'Ahmad helps players improve their agility, strength, and endurance.',
                'experience' => '2 Years',
                'specialty' => 'Fitness & Conditioning',
                'image' => 'coach4.jpg'
            ],
            [
                'name' => 'Nemer Ashour',
                'title' => 'Coach',
                'bio' => 'Nemer emphasizes teamwork and fair play for all participants.',
                'experience' => '2 Years',
                'specialty' => 'Coaching',
                'image' => 'coach5.jpg'
            ], 
            [
                'name' => 'Ahmad Hamasha',
                'title' => 'Skill Development Coach',
                'bio' => 'Ahmad provides personalized guidance to enhance performance in games.',
                'experience' => '2 Years',
                'specialty' => 'Coaching',
                'image' => 'coach6.jpg'
            ],
            [
                'name' => 'Mohammad Abu Arja',
                'title' => 'Strategy Coach',
                'bio' => 'Mohammad trains players on positioning, teamwork, and competitive strategies.',
                'experience' => '1 Years',
                'specialty' => 'Coaching',
                'image' => 'coach7.jpg'
            ],
            [
                'name' => 'Layan Jawabreh',
                'title' => 'Wellness Coach',
                'bio' => 'Layan helps players maintain peak physical and mental condition. She combines fitness routines with nutrition advice tailored for dodgeball athletes.',
                'experience' => '1 Years',
                'specialty' => 'Coaching',
                'image' => 'coach8.jpg'
    ]
        ];

        foreach ($coaches as $coach) {
            Coach::create($coach);
        }

        echo "✅ Coaches added successfully!\n";
    }
}