<?php

namespace Database\Seeders;

use App\Models\Kopdes;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        Kopdes::factory()->create([
            'name' => 'Kopdes Sukun',
            'province' => "Jawa Timur",
            'city' => "Malang",
            'address' => "Jalan abcde"
        ]);

        User::factory()->create([
            'name' => 'Test1',
            'email' => 'test@example.com',
            'password' => 'test123',
            'role' => 'admin',
        ]);
    }
}
