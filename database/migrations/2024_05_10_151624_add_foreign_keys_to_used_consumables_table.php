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
        Schema::table('used_consumables', function (Blueprint $table) {
            $table->foreign(['statement_uuid'], 'used_consumables_ibfk_1')->references(['uuid'])->on('statements')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['consumable_uuid'], 'used_consumables_ibfk_2')->references(['uuid'])->on('consumables')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('used_consumables', function (Blueprint $table) {
            $table->dropForeign('used_consumables_ibfk_1');
            $table->dropForeign('used_consumables_ibfk_2');
        });
    }
};
