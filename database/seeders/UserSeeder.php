<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => Hash::make('password')
        ]);

        User::create([
            'first_name' => 'Retail',
            'email' => 'retail@example.com',
            'role' => 'client_retail',
            'password' => Hash::make('password')
        ]);

        User::create([
            'first_name' => 'Wholesale',
            'email' => 'wholesale@example.com',
            'role' => 'client_wholesale',
            'password' => Hash::make('password')
        ]);
    }
}
