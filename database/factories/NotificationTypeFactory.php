<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NotificationType>
 */
class NotificationTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()
                ->unique()
                ->randomElement([
                    'ha iniziato a seguirti', 
                    'ha messo mi piace ad un tuo post', 
                    'ha commentato un tuo post',
                    'ha messo mi piace ad un tuo commento'
                ])
        ];
    }
}
