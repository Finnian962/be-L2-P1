<?php

namespace Database\Seeders;

use App\Models\Allergeen;
use Illuminate\Database\Seeder;

class AllergeenSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $now = now();

        $allergenen = [
            ['Naam' => 'Gluten', 'Omschrijving' => 'Dit product bevat gluten'],
            ['Naam' => 'Gelatine', 'Omschrijving' => 'Dit product bevat gelatine'],
            ['Naam' => 'AZO-Kleurstof', 'Omschrijving' => 'Dit product bevat AZO-kleurstoffen'],
            ['Naam' => 'Lactose', 'Omschrijving' => 'Dit product bevat lactose'],
            ['Naam' => 'Soja', 'Omschrijving' => 'Dit product bevat soja'],
        ];

        foreach ($allergenen as $allergeen) {
            Allergeen::create(array_merge($allergeen, [
                'IsActief' => true,
                'Opmerkingen' => null,
                'DatumAangemaakt' => $now,
                'DatumGewijzigd' => $now,
            ]));
        }
    }
}