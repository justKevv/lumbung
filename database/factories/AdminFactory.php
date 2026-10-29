<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Kopdes;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'users_id' => User::factory(),
            'kopdes_id' => Kopdes::factory(),
        ];
    }
}
