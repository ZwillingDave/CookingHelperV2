<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('recipes', function (Blueprint $table) {
        $table->id(); // Primärschlüssel
        $table->string('name');
        $table->text('description')->nullable(); // Beschreibung des Rezepts
        $table->text('instruction'); // Zubereitungshinweise
        $table->string('image')->nullable(); // Bild des Rezepts
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
        Schema::dropIfExists('recipes');
    }
}