<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Membuat akun Administrator
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // Ganti dengan password yang aman
            'role' => 'admin',
        ]);

        // Membuat akun Resepsionis
        User::create([
            'name' => 'Receptionist User',
            'email' => 'receptionist@example.com',
            'password' => bcrypt('password'), // Ganti dengan password yang aman
            'role' => 'resepsionis',
        ]);

        // Membuat akun Tamu
        User::create([
            'name' => 'Guest User',
            'email' => 'guest@example.com',
            'password' => bcrypt('password'), // Ganti dengan password yang aman
            'role' => 'tamu',
        ]);
    }
}
