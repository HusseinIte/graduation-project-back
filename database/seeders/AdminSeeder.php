<?php

namespace Database\Seeders;

use App\Models\User\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'email' => 'admin@email',
            'name' => 'حسين حمدان',
            'password' => Hash::make(12345678),
        ]);
    }
}
