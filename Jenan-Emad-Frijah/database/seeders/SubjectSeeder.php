<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $subjects = [
            ['name' => 'Mathematics', 'description' => 'Algebra, calculus, and geometry'],
            ['name' => 'Physics', 'description' => 'Mechanics and electricity'],
            ['name' => 'Chemistry', 'description' => 'Organic and inorganic chemistry'],
            ['name' => 'English', 'description' => 'Grammar and conversation'],
            ['name' => 'Programming', 'description' => 'Web and software development'],
            ['name' => 'Biology', 'description' => 'Human and plant biology'],
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
}
