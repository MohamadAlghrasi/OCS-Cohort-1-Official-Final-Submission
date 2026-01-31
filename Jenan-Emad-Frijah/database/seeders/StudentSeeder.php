<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students=[
            ['name' => 'yasser' , 'email'=> 'yasser@gmail.com', ],
            ['name' => 'nadem' , 'email'=> 'nadem@gmail.com' ,],
            ['name' => 'sahar' , 'email'=> 'sahar@gmail.com', ],
            ['name' => 'salam' , 'email'=> 'salam@gmail.com' ,],
            ['name' => 'ketam' , 'email'=> 'ketam@gmail.com' ,],
            ['name' => 'rawan' , 'email'=> 'rawan@gmail.com' ,],
            ['name'=>'raed' , 'email'=>'raed@gmail.com',],
            ['name'=>'kamal' , 'email'=>'kamal@gmail.com'],
        ];


     foreach($students as $student){
 
       $user = User::create([
        'name'=> $student['name'],
        'email'=>$student['email'],
        'password'=> bcrypt('password'),
        'role'=>'student',
       ]);

  

     }
     


    }
}
