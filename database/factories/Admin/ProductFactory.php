<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(3, true),
            'price' => mt_rand(200, 1000),
            'count' => mt_rand(1, 100),
            'code' => mt_rand(2000, 10000),
            //'category_id' => Category::query()->inRandomOrder()->value('id'),
        ];
    }
}
