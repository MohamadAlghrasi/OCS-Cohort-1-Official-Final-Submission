<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Service;

class ServicesSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        // Clear existing data
        Service::truncate();
        
        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Add services data
        $services = [
            [
                'title' => 'Weekly League Games',
                'description' => 'Join our scheduled weekly matches for players of all skill levels. A great way to stay active, meet new people, and improve your game in a structured environment.',
                'icon_class' => 'fas fa-calendar-days',
                'order' => 1
            ],
            [
                'title' => 'Private Game Bookings',
                'description' => 'Want to arrange a game for your friends, coworkers, or a special event? Schedule a private dodgeball match at your preferred time and venue.',
                'icon_class' => 'fas fa-user-friends',
                'order' => 2
            ],
            [
                'title' => 'Game Prep Session',
                'description' => 'Get ready to play! Our coaches start each session with a guided warm-up, a clear review of the rules (especially for first-timers), and key strategies to help your team succeed.',
                'icon_class' => 'fas fa-person-running',
                'order' => 3
            ],
            [
                'title' => 'Tournaments & Competitions',
                'description' => 'We organize seasonal dodgeball tournaments for competitive players and teams. Prizes, referees, and professional setups included.',
                'icon_class' => 'fas fa-trophy',
                'order' => 4
            ],
            [
                'title' => 'Corporate & Team Building',
                'description' => 'Perfect for companies looking for fun, engaging team activities. We customize games to fit group size and goals.',
                'icon_class' => 'fas fa-handshake',
                'order' => 5
            ],
            [
                'title' => 'Youth & School Programs',
                'description' => 'Introduce dodgeball to schools and youth groups with our safe, supervised, and skill-focused sessions.',
                'icon_class' => 'fas fa-graduation-cap',
                'order' => 6
            ]
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        echo "✅ Services added successfully!\n";
    }
}