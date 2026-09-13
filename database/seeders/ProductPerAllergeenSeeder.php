<?php

namespace Database\Seeders;

use App\Models\ProductPerAllergeen;
use Illuminate\Database\Seeder;

class ProductPerAllergeenSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $now = now();

        $koppelingen = [
            ['ProductId' => 1, 'AllergeenId' => 2],
            ['ProductId' => 1, 'AllergeenId' => 1],
            ['ProductId' => 1, 'AllergeenId' => 3],
            ['ProductId' => 3, 'AllergeenId' => 4],
            ['ProductId' => 6, 'AllergeenId' => 5],
            ['ProductId' => 9, 'AllergeenId' => 2],
            ['ProductId' => 9, 'AllergeenId' => 5],
            ['ProductId' => 10, 'AllergeenId' => 2],
            ['ProductId' => 12, 'AllergeenId' => 4],
            ['ProductId' => 13, 'AllergeenId' => 1],
            ['ProductId' => 13, 'AllergeenId' => 4],
            ['ProductId' => 13, 'AllergeenId' => 5],
        ];

        foreach ($koppelingen as $koppeling) {
            ProductPerAllergeen::create(array_merge($koppeling, [
                'IsActief' => true,
                'Opmerkingen' => null,
                'DatumAangemaakt' => $now,
                'DatumGewijzigd' => $now,
            ]));
        }
    }
}