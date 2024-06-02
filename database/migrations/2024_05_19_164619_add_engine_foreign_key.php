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
            'Model',
            function (Blueprint $table) {
                $table->foreignId('engine_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(
            'Model',
            function (Blueprint $table) {
                $table->dropForeign(['engine_id']);
            }
        );
    }
};
