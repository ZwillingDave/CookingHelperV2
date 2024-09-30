<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Führe die Datenbank-Seeds aus.
     */
    public function run(): void
    {
        // Beispielbenutzer in die Datenbank einfügen
        User::create([
            'name' => 'Michael',
            'email' => 'michael@email.com',
            'password' => Hash::make('asdfasdf'), // Verschlüsseltes Passwort
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Erika Musterfrau',
            'email' => 'erika@example.com',
            'password' => Hash::make('asdfasdf'), // Verschlüsseltes Passwort
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Hans Beispiel',
            'email' => 'hans@example.com',
            'password' => Hash::make('asdfasdf'), // Verschlüsseltes Passwort
            'email_verified_at' => now(),
        ]);
    }
}
