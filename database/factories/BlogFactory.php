<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' =>$this->faker->sentence(),
            'slug' =>$this->faker->slug(),
            'intro' =>$this->faker->sentence(),
            'body' =>$this->faker->paragraph(),
            'category_id' => Category::factory(), 
        ];
    }
}
