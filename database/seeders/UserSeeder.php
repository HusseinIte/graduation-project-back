<?php

namespace Database\Seeders;

use App\Models\User\User;
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
            'user_type_id' => 4,
            'email' => 'customer1@email',
            'password' => Hash::make('12345678')
        ]);
        User::create([
            'user_type_id' => 4,
            'email' => 'customer2@email',
            'password' => Hash::make('12345678')
        ]);
        User::create([
            'user_type_id' => 4,
            'email' => 'customer3@email',
            'password' => Hash::make('12345678')
        ]);
        User::create([
            'user_type_id' => 4,
            'email' => 'customer4@email',
            'password' => Hash::make('12345678')
        ]);
    }
}

