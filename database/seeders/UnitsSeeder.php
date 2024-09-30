<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unit; // Unit-Modell importieren

class UnitsSeeder extends Seeder
{
    /**
     * Führe die Datenbank-Seeds aus.
     */
    public function run(): void
    {
        // Einheiten, die in die Datenbank eingefügt werden sollen
        $units = [
            ['abbr' => 'kg', 'name' => 'Kilogramm'],
            ['abbr' => 'g', 'name' => 'Gramm'],
            ['abbr' => 'L', 'name' => 'Liter'],
            ['abbr' => 'ml', 'name' => 'Milliliter'],
            ['abbr' => 'Stk', 'name' => 'Stück'],
            ['abbr' => 'Tasse', 'name' => 'Tasse'],
            ['abbr' => 'TL', 'name' => 'Teelöffel'],
            ['abbr' => 'EL', 'name' => 'Esslöffel'],
        ];

        // Einheiten in die Datenbank einfügen
        foreach ($units as $unit) {
            Unit::create($unit);
        }
    }
}
