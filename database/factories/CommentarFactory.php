<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commentar>
 */
class CommentarFactory extends Factory
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
            'news_id' => '1',
            'commentar' => fake()->sentence(),
            'author_email' => fake()->email(),
            'author_name' => fake()->name()
        ];
    }
}
