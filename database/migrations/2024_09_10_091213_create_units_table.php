<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
{
    Schema::create('units', function (Blueprint $table) {
        $table->id(); // Primärschlüssel
        $table->string('abbr'); // Abkürzung, z.B. "kg", "g"
        $table->string('name'); // Name der Einheit, z.B. "Kilogramm"
        $table->timestamps();
    });
}

    
        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('units');
        }
    };
