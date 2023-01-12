<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@sogoo.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
            'is_admin' => true,
        ]);

    }
}
