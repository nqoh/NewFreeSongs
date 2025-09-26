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
            'user_id' => 1,
            'title' => Fake()->userName(),
            'description' => Fake()->paragraph(30),
            'image' => Fake()->randomElement([
                '1589181097.jpg','1544100757.jpg','1587273672.jpg',
                '1543899980.jpg','1543900136.jpg','1543900225.jpg',
                '1543900354.jpg','1543901531.jpg','1550621814.jpg'
            ]),
        ];
    }
}
