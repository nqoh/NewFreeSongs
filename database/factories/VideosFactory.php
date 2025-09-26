<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Videos>
 */
class VideosFactory extends Factory
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
                '1550578972.jpg','1550578865.jpg','1546864431.jpg',
                '1550621454.jpg','1550621646.jpg','1550621814.jpg',
                '1589178742.jpg','1544100757.jpg','1550621814.jpg'
            ]),
            'endpiont' => Fake()->userName()
        ];
    }
}
