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
    Schema::create('storageitems', function (Blueprint $table) {
        $table->id(); // Primärschlüssel
        $table->unsignedBigInteger('user_id');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->unsignedBigInteger('product_id'); // Verknüpfung zu Produkten
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade'); // Fremdschlüssel hinzufügen
        $table->string('product_name'); // Name des Produkts
        $table->float('quantity'); // Menge des Produkts im Lager
        $table->unsignedBigInteger('unit_id'); // Verknüpfung zur Einheit
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