<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('shopping_list', function (Blueprint $table) {
            $table->id(); // Primärschlüssel
            $table->unsignedBigInteger('user_id'); // Verknüpfung zu Benutzern
            $table->unsignedBigInteger('product_id'); // Verknüpfung zu Produkten
            $table->float('quantity'); // Menge des Produkts
            $table->timestamps(); // Erstellt created_at und updated_at
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping_list');
    }
};
