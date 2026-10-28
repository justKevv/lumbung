<?php

namespace Database\Factories;

use App\Models\Kopdes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Kopdes>
 */
class KopdesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'province' => fake()->randomElement([
                'Jawa Timur',
                'Jawa Barat',
                'Kalimantan',
                'Sumatra'
            ]),
            'city' => fake()->city(),
            'address' => fake()->address()
        ];
    }
}
