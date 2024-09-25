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
            //ProductSeeder::class,
            RecipeSeeder::class // Hier sollte dein ProductSeeder eingetragen sein
        ]);
    }
}
