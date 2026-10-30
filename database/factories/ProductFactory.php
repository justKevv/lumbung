<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Beras Premium 5 kg',
                'Minyak Goreng 1 L',
                'Gula Pasir 1 kg',
                'Telur Ayam 1 kg',
                'Tepung Terigu 1 kg',
                'Kopi Bubuk 200 g',
                'Teh Celup Melati',
                'Sabun Mandi Cair',
                'Sampo Sachet',
                'Mie Instan Goreng',
                'Kecap Manis 600 ml',
                'Sambal Botol',
                'Kerupuk Udang',
                'Susu Kental Manis',
                'Garam Dapur 500 g',
                'Pasta Gigi 190 g',
                'Deterjen Bubuk 800 g',
                'Air Mineral 600 ml',
                'Roti Tawar',
                'Biskuit Kelapa',
            ]),
            'price' => fake()->numberBetween(1000, 50000),
        ];
    }
}
