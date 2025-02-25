<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
         return [
            'user_id' => User::factory(),
            'title' => fake()->sentence(3),
            'overview' => fake()->realTextBetween(100, 250),
            'genre' => fake()->randomElement(['true', 'false', 'test', 'romance', 'finance', 'education']),
        ];
    }
}
