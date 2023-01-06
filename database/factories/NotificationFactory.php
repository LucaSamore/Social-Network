<?php

namespace Database\Factories;

use App\Models\NotificationType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notification>
 */
final class NotificationFactory extends Factory
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
            'from' => User::all()->random()->id,
            'to' => User::all()->random()->id,
            'type' => NotificationType::all()->random()->name,
            'created_at' => now()
        ];
    }
}
