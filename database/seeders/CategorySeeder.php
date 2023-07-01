<?php

namespace Database\Seeders;

use App\Models\Admin\Category;

use App\Models\Admin\Product;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()
            ->count(10)
            ->has(Product::factory()->count(10))
            ->create();
    }
}
