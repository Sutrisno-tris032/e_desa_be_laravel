<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'news_category' => '1',
            'news_title' => fake()->sentence(),
            'news_description' => fake()->paragraph,
            'news_tag' => fake()->sentence(),
            'author' => fake()->name(), 
            'image' => fake()->imageUrl(),
        ];
    }
}
