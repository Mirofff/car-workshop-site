<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table(
            'used_consumables',
            function (Blueprint $table) {
                $table->foreignId('statement_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
                $table->foreignId('consumable_id')->constrained()->onUpdate('cascade')->onDelete('cascade');

                $table->unique(['statement_id', 'consumable_id']);
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(
            'used_consumables',
            function (Blueprint $table) {
                $table->dropForeign(['consumable_id']);
                $table->dropForeign(['statement_id']);
            }
        );
    }
};
