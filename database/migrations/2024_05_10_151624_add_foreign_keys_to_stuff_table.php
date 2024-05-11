<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('stuff', function (Blueprint $table) {
            $table->foreign(['workshop_uuid'], 'stuff_ibfk_1')->references(['uuid'])->on('workshops')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stuff', function (Blueprint $table) {
            $table->dropForeign('stuff_ibfk_1');
        });
    }
};
