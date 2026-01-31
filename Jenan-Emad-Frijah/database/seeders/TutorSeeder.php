<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tutor;
use App\Models\Subject;

class TutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = Subject::all();

        $tutorsData = [
            [
                'name' => 'Ahmad Khaled',
                'email' => 'ahmad@test.com',
                'bio' => 'Experienced math and physics tutor',
            ],
            [
                'name' => 'Sara Ali',
                'email' => 'sara@test.com',
                'bio' => 'English tutor for all levels',
            ],
            [
                'name' => 'Omar Hassan',
                'email' => 'omar@test.com',
                'bio' => 'Programming and web development tutor',
            ],
            [
                'name' => 'Lina Youssef',
                'email' => 'lina@test.com',
                'bio' => 'Biology and chemistry tutor',
            ],
            [
                'name' => 'Mohammad Saleh',
                'email' => 'mohammad@test.com',
                'bio' => 'Physics tutor for high school students',
            ],
        ];

        foreach ($tutorsData as $data) {

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt('password'),
                'role' => 'tutor',
            ]);

            $tutor = Tutor::create([
                'user_id' => $user->id,
                'bio' => $data['bio'],
            ]);

            $tutor->subjects()->attach(
                $subjects->random(rand(1, 3))->pluck('id')->toArray(),
                [
                    'price_per_hour' => rand(10, 30),
                    'grade' => 'High School'
                ]
            );
        }
    }
}
