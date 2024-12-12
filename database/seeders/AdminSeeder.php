<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'alireza',
            'email' => 'alireza@example.com',
            'password' => bcrypt('123456'), // Set a strong password
            'role' => 'admin',
        ]);
    }
}
