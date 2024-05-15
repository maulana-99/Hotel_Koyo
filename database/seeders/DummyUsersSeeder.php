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
                'name' => 'Mas Rasya',
                'email' => 'tamu@gmail.com',
                'role' => 'tamu',
                'password' => bcrypt('12345')
            ],
            [
                'name' => 'Mas Dhimas',
                'email' => 'resep@tch.com',
                'role' => 'resepsionis',
                'password' => bcrypt('12345')
            ],
            [
                'name' => 'Mas Rapid',
                'email' => 'admin@tch.com',
                'role' => 'admin',
                'password' => bcrypt('12345')
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
