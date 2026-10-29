<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Alleen de inlogaccounts aanmaken.
     * De Jamin-tabellen komen uit db/create_script_Jamin.sql.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@jamin.nl'],
            [
                'name' => 'Admin Jamin',
                'password' => 'password',
                'Role' => 'Admin',
            ]
        );

        User::firstOrCreate(
            ['email' => 'medewerker@jamin.nl'],
            [
                'name' => 'Magazijnmedewerker Jamin',
                'password' => 'password',
                'Role' => 'Magazijnmedewerker',
            ]
        );
    }
}
