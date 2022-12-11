<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

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
    public function definition()
    {
        return [
            'id' => fake()->uuid(),
            'textual_content' => fake()->text(),
            'number_of_likes' => 0,
            'number_of_comments' => 0,
            'number_of_reposts' => 0,
            'user_id' => User::all()->random()->id
        ];
    }
}
