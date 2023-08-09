<?php

namespace Database\Seeders;

use App\Models\Category\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'إطارات'
        ]);
        Category::create([
            'name' => 'أجهزة طبية'
        ]);
        Category::create([
            'name' => 'عدسات'
        ]);
    }
}
