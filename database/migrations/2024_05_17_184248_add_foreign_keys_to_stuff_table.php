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
            'stuff',
            function (Blueprint $table) {
                $table->foreignId('workshop_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(
            'stuff',
            function (Blueprint $table) {
                $table->dropForeign(['workshop_id']);
            }
        );
    }
};
