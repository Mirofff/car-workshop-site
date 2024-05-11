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
        Schema::create('used_consumables', function (Blueprint $table) {
            $table->char('uuid', 36)->default('uuid()')->primary();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
            $table->char('statement_uuid', 36)->index('statement_uuid');
            $table->char('consumable_uuid', 36)->index('consumable_uuid');
            $table->integer('quantity');

            $table->unique(['statement_uuid', 'consumable_uuid'], 'idx_statement_consumable');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('used_consumables');
    }
};
