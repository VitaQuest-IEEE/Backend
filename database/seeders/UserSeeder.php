<?php

namespace Database\Seeders;

use App\Enum\UserTypeEnum;
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
            'name' => 'deleted account',
            'email' => 'ahmed1@admin.com',
            'password' => Hash::make("password"),
            'email_verified_at' => now(),
            'phone' => '01000000001',
            'type' => 'user',
        ]);
    }
}


