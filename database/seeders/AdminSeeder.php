<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if admin already exists to prevent duplicate records
        if (!User::where('email', 'adityamishra971916@gmail.com')->exists()) {
            User::create([
                'name' => 'Egma',
                'email' => 'adityamishra971916@gmail.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]);

            $this->command->info('Admin user created successfully.');
        } else {
            $this->command->info('Admin user already exists.');
        }
    }
}
