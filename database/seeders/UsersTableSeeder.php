<?php

namespace Database\Seeders;

use Faker\Guesser\Name;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users=[
            'user_1'=> [
                'name' => 'Filippo',
                'lastname' => 'Perrone',
                'email' => 'F_P@gmail.com',
                'password' => 'password',
            ],
            'user_2'=> [
                'name' => 'Tomas',
                'lastname' => 'Belfonte',
                'email' => 'T_B@gmail.com',
                'password' => 'password',
            ],
            'user_3'=> [
                'name' => 'Riccardo',
                'lastname' => 'Trave',
                'email' => 'R_T@gmail.com',
                'password' => 'password',
            ],
            'user_4'=> [
                'name' => 'Nicolae',
                'lastname' => 'Cheptae',
                'email' => 'N_C@gmail.com',
                'password' => 'password',
            ],
            'user_5'=> [
                'name' => 'Paolo',
                'lastname' => 'Crescenzi',
                'email' => 'P_C@gmail.com',
                'password' => 'password',
            ]
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'], 
                'lastname' => $user['lastname'], 
                'email' => $user['email'], 
                'password' => $user['password'], 
            ]);
        };
    }
}