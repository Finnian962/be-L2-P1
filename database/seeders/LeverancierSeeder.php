<?php

namespace Database\Seeders;

use App\Models\Leverancier;
use Illuminate\Database\Seeder;

class LeverancierSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $now = now();

        $leveranciers = [
            ['Naam' => 'Venco', 'ContactPersoon' => 'Bert van Linge', 'LeverancierNummer' => 'L1029384719', 'Mobiel' => '06-28493827'],
            ['Naam' => 'Astra Sweets', 'ContactPersoon' => 'Jasper del Monte', 'LeverancierNummer' => 'L1029284315', 'Mobiel' => '06-39398734'],
            ['Naam' => 'Haribo', 'ContactPersoon' => 'Sven Stalman', 'LeverancierNummer' => 'L1029324748', 'Mobiel' => '06-24383291'],
            ['Naam' => 'Basset', 'ContactPersoon' => 'Joyce Stelterberg', 'LeverancierNummer' => 'L1023845773', 'Mobiel' => '06-48293823'],
            ['Naam' => 'De Bron', 'ContactPersoon' => 'Remco Veenstra', 'LeverancierNummer' => 'L1023857736', 'Mobiel' => '06-34291234'],
        ];

        foreach ($leveranciers as $leverancier) {
            Leverancier::create(array_merge($leverancier, [
                'IsActief' => true,
                'Opmerkingen' => null,
                'DatumAangemaakt' => $now,
                'DatumGewijzigd' => $now,
            ]));
        }
    }
}