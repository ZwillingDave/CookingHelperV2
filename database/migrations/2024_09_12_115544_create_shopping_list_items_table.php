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
        Schema::create('shopping_list_items', function (Blueprint $table) {
            $table->id(); // Primärschlüssel
            $table->unsignedBigInteger('shopping_list_id'); // Verknüpfung zur shoppinglist
            $table->string('product_name'); // Name des Produkts
            $table->unsignedBigInteger('product_id'); // Verknüpfung zu Produkten
            $table->float('quantity'); // Menge des Produkts
            $table->unsignedBigInteger('unit_id'); // Verknüpfung zur Einheit
            $table->boolean('is_purchased')->default(false); // Ist das Produkt gekauft
            $table->timestamps(); // Erstellt created_at und updated_at
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping_list_items');
    }
};