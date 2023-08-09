<?php

namespace Database\Seeders;

use App\Models\Category\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubCategory::create([
            'category_id' => 1,
            'type' => 'رجالي'
        ]);

        SubCategory::create([
            'category_id' => 1,
            'type' => 'أطفال'
        ]);

        SubCategory::create([
            'category_id' => 1,
            'type' => 'نسائي'
        ]);
    }
}
