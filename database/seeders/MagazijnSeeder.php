<?php

namespace Database\Seeders;

use App\Models\Magazijn;
use Illuminate\Database\Seeder;

class MagazijnSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $now = now();

        $magazijnRegels = [
            ['ProductId' => 1, 'VerpakkingsEenheid' => 5, 'AantalAanwezig' => 453],
            ['ProductId' => 2, 'VerpakkingsEenheid' => 2.5, 'AantalAanwezig' => 400],
            ['ProductId' => 3, 'VerpakkingsEenheid' => 5, 'AantalAanwezig' => 1],
            ['ProductId' => 4, 'VerpakkingsEenheid' => 1, 'AantalAanwezig' => 800],
            ['ProductId' => 5, 'VerpakkingsEenheid' => 3, 'AantalAanwezig' => 234],
            ['ProductId' => 6, 'VerpakkingsEenheid' => 2, 'AantalAanwezig' => 345],
            ['ProductId' => 7, 'VerpakkingsEenheid' => 1, 'AantalAanwezig' => 795],
            ['ProductId' => 8, 'VerpakkingsEenheid' => 10, 'AantalAanwezig' => 233],
            ['ProductId' => 9, 'VerpakkingsEenheid' => 2.5, 'AantalAanwezig' => 123],
            ['ProductId' => 10, 'VerpakkingsEenheid' => 3, 'AantalAanwezig' => null],
            ['ProductId' => 11, 'VerpakkingsEenheid' => 2, 'AantalAanwezig' => 367],
            ['ProductId' => 12, 'VerpakkingsEenheid' => 1, 'AantalAanwezig' => 467],
            ['ProductId' => 13, 'VerpakkingsEenheid' => 5, 'AantalAanwezig' => 20],
        ];

        foreach ($magazijnRegels as $regel) {
            Magazijn::create(array_merge($regel, [
                'IsActief' => true,
                'Opmerkingen' => null,
                'DatumAangemaakt' => $now,
                'DatumGewijzigd' => $now,
            ]));
        }
    }
}