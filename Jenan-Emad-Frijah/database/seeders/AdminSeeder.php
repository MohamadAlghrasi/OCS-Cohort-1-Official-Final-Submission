<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
        ['email'=> 'admin@gmail.com'],
        ['name'=>'admin',
         'password'=> Hash::make('Admin@123'),
         'role'=>'admin',
        ]
        );
    }
}
