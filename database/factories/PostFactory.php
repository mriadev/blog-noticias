<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // title	publication_date	description	image	genre_id	user_id	created_at	updated_at	
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'image' => 'default.jpg',
            'genre_id' => $this->faker->numberBetween(1, 10),
            'user_id' => $this->faker->numberBetween(1, 4),

        ];
    }

    
}
