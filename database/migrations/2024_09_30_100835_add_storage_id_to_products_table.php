<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('storage_id')->nullable()->after('id'); // 'storage_id' als foreign key
            $table->foreign('storage_id')->references('id')->on('storage')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['storage_id']);
            $table->dropColumn('storage_id');
        });
    }
};
