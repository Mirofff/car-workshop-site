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
        Schema::table('vehicles', function (Blueprint $table) {
            $table->foreign(['model_id'], 'vehicles_ibfk_1')->references(['id'])->on('models')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['workshop_uuid'], 'vehicles_ibfk_2')->references(['uuid'])->on('workshops')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['client_uuid'], 'vehicles_ibfk_3')->references(['uuid'])->on('clients')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropForeign('vehicles_ibfk_1');
            $table->dropForeign('vehicles_ibfk_2');
            $table->dropForeign('vehicles_ibfk_3');
        });
    }
};
