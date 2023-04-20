<?php

namespace Database\Factories;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $genres = Genre::pluck('id')->toArray();

        return [
            'title' => fake()->text(15),
            'description' => fake()->realText(100),
            'year' => fake()->year(),
            'genre_id' => fake()->randomElement($genres),
            'active' => fake()->boolean()
        ];
    }
}
