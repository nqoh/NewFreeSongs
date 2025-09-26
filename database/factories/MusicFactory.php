<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Testing\Fakes\Fake;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Music>
 */
class MusicFactory extends Factory
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
            'description' => Fake()->paragraph(10),
            'image' => Fake()->randomElement([
                '1543885881.jpg','1543899635.jpg','1543899830.jpg',
                '1543899980.jpg','1543900136.jpg','1543900225.jpg',
                '1543900354.jpg','1543901531.jpg','1550621814.jpg'
            ]),
            'genre' => Fake()->randomElement([
                'Hiphop','Mix','Gqom','Gospel',
                'House','Afrobeat','Piano','Other'
                ])
        ];
    }
}
