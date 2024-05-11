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
        Schema::table('statements', function (Blueprint $table) {
            $table->foreign(['client_uuid'], 'statements_ibfk_1')->references(['uuid'])->on('clients')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['vehicle_uuid'], 'statements_ibfk_2')->references(['uuid'])->on('vehicles')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['request_uuid'], 'statements_ibfk_3')->references(['uuid'])->on('requests')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('statements', function (Blueprint $table) {
            $table->dropForeign('statements_ibfk_1');
            $table->dropForeign('statements_ibfk_2');
            $table->dropForeign('statements_ibfk_3');
        });
    }
};
