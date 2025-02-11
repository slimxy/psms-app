<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //
        User::firstOrCreate(
            ['email' =>'admin@example.com'],
            ['name' => 'SuperAdmin', 'email' => 'admin@example.com', 'password' => Hash::make('password123'), 'uname' => 'SuperAdmin', 'role' => 'Admin', 'state' => 'admin', 'station' => 'superAdmin']
        );
    }
}
