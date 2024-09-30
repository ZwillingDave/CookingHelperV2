<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ProductSeeder::class,// Dieser Befehl ruft den ProductSeeder auf und füllt die Datenbank mit den Daten aus der run-Methode
            RecipeSeeder::class, // Dieser Befehl ruft den RecipeSeeder auf und füllt die Datenbank mit den Daten aus der run-Methode
            UnitsSeeder::class, // Dieser Befehl ruft den UnitsSeeder auf und füllt die Datenbank mit den Daten aus der run-Methode
            UsersSeeder::class // Dieser Befehl ruft den UsersSeeder auf und füllt die Datenbank mit den Daten aus der run-Methode

        ]);
    }
}
