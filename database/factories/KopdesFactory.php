<?php

namespace Database\Factories;

use App\Models\Kopdes;
use Creasi\Nusa\Models\Village;
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
        $village = Village::query()
            ->with('district.regency.province')
            ->inRandomOrder()
            ->firstOrFail();

        return [
            'name' => 'Kopdes '.$village->name,
            'province' => $village->district->regency->province->name,
            'city' => $village->district->regency->name,
            'kecamatan' => $village->district->name,
            'kelurahan' => $village->name,
            'address' => fake()->address()
        ];
    }
}
