<?php

namespace Database\Factories;

use App\Models\Genre;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'user_id' => User::pluck('id')->random(),
            'genre_id' => Genre::pluck('id')->random(),
            'title' => fake()->name(),
            'desc' => fake()->name(),
            'year' => fake()->randomDigit(),
            'album_image' => 'test.jpg',
            'rating' => fake()->randomDigit()
        ];
    }
}
