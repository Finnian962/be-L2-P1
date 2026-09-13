<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LeverancierSeeder::class,
            AllergeenSeeder::class,
            ProductSeeder::class,
            MagazijnSeeder::class,
            ProductPerAllergeenSeeder::class,
            ProductPerLeverancierSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Admin Jamin',
            'email' => 'admin@jamin.nl',
            'password' => 'password',
            'Role' => 'Admin',
        ]);

        User::factory()->create([
            'name' => 'Magazijnmedewerker Jamin',
            'email' => 'medewerker@jamin.nl',
            'password' => 'password',
            'Role' => 'Magazijnmedewerker',
        ]);
    }
}