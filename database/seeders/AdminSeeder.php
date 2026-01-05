<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Admin full akses
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
            ]
        );

        // Admin1 akses terbatas
        User::updateOrCreate(
            ['email' => 'admin1@gmail.com'],
            [
                'name' => 'Admin1',
                'password' => bcrypt('admin123'),
                'role' => 'admin1',
            ]
        );
    }
}
