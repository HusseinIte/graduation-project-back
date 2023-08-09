<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category\Category;
use App\Models\Category\CategoryAttribute;
use App\Models\Order\Department;
use App\Models\User\User;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserTypeSeeder::class,
            AdminSeeder::class,
            DepartmentSeeder::class,
//            UserSeeder::class,
//            OrderSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class

        ]);
    }
}
