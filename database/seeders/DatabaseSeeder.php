<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Kopdes;
use App\Models\Product;
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
        $kopdes = Kopdes::factory(1)->create();

        $kopdes->each(function (Kopdes $kopdes, int $index) {
            $user = User::factory()->create([
                'email' => 'admin'.($index + 1).'@example.com',
                'password' => 'Admin1234',
            ]);

            Admin::factory()->create([
                'users_id' => $user->id,
                'kopdes_id' => $kopdes->id,
            ]);
        });

        Product::factory(20)->create();

        User::factory()->create([
            'name' => 'Test1',
            'email' => 'test@example.com',
            'password' => 'Test1234',
            'role' => 'super_admin',
        ]);
    }
}
