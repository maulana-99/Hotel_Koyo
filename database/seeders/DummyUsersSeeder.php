<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Tamu',
                'email' => 'tamu@gmail.com',
                'role' => 'tamu',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'Resepsionis',
                'email' => 'resep@tch.com',
                'role' => 'resepsionis',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@tch.com',
                'role' => 'admin',
                'password' => bcrypt('12345678')
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
