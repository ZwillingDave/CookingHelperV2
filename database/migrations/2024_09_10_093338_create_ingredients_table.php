<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('ingredients', function (Blueprint $table) {
        $table->id(); // Primärschlüssel
        $table->unsignedBigInteger('recipe_id'); // Verknüpfung zu Rezepten
        $table->unsignedBigInteger('product_id'); // Verknüpfung zu Produkten
        $table->float('quantity'); // Menge des Produkts
        $table->unsignedBigInteger('unit_id'); // Verknüpfung zur Einheit
        $table->timestamps(); // Erstellt created_at und updated_at
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients');
    }
}