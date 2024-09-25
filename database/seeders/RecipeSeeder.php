<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->insert([
            ['name' => 'Pfannkuchen', 'description' => 'Ein einfaches Pfannkuchenrezept.', 'instruction' => 'test'],
            ['name' => 'Kuchen', 'description' => 'Ein traditioneller Kuchen.', 'instruction' => 'test'],
            ['name' => 'Brot', 'description' => 'Hausgemachtes Brot.', 'instruction' => 'test'],
            ['name' => 'Waffeln', 'description' => 'Leckere Waffeln mit Sirup.', 'instruction' => 'test'],
            ['name' => 'Muffins', 'description' => 'Frische Blaubeermuffins.', 'instruction' => 'test'],
        ]);
    }
}
