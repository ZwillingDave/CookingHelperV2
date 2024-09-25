<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['name' => 'Mehl', 'unit_id' => 2, 'description' => 'Weizenmehl für Backen', 'image' => null],
            ['name' => 'Zucker', 'unit_id' => 2, 'description' => 'Weißer Kristallzucker', 'image' => null],
            ['name' => 'Milch', 'unit_id' => 3, 'description' => 'Frische Vollmilch', 'image' => null],
            ['name' => 'Eier', 'unit_id' => 1, 'description' => 'Freiland-Eier', 'image' => null],
            ['name' => 'Butter', 'unit_id' => 2, 'description' => 'Ungesalzene Butter', 'image' => null],
            ['name' => 'Backpulver', 'unit_id' => 2, 'description' => 'Backtriebmittel', 'image' => null],
            ['name' => 'Salz', 'unit_id' => 2, 'description' => 'Feines Meersalz', 'image' => null],
            ['name' => 'Öl', 'unit_id' => 3, 'description' => 'Sonnenblumenöl', 'image' => null],
            ['name' => 'Honig', 'unit_id' => 3, 'description' => 'Blütenhonig', 'image' => null],
            ['name' => 'Hefe', 'unit_id' => 2, 'description' => 'Frische Hefe', 'image' => null],
        ]);
    }
}
