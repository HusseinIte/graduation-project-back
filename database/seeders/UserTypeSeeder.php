<?php

namespace Database\Seeders;

use App\Models\User\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserType::create([
            'type' => 'مستودع',
        ]);
        UserType::create([
            'type' => 'توصيل',
        ]);
        UserType::create([
            'type' => 'صيانة',
        ]);
        UserType::create([
            'type' => 'زبون',
        ]);
    }
}
