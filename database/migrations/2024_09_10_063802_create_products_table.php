<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement(); // Primärschlüssel
            $table->string('name'); // Name des Produkts
            $table->unsignedBigInteger('unit_id'); // Fremdschlüssel zu units
            $table->string('image')->nullable(); // Bild des Produkts, optional
            $table->text('description')->nullable(); // Beschreibung des Produkts, optional
            $table->timestamps(); // Erstellt created_at und updated_at
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
