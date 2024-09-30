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
    Schema::create('storage', function (Blueprint $table) {
        $table->id(); // Primärschlüssel
        $table->unsignedBigInteger('product_id'); // Verknüpfung zu Produkten
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade'); // Fremdschlüssel hinzufügen
        $table->float('quantity'); // Menge des Produkts im Lager
        $table->timestamps(); // Erstellt created_at und updated_at
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('storage');
    }
};
