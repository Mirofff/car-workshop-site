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
            'vehicles',
            function (Blueprint $table) {
                $table->foreignId('model_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
                $table->foreignId('workshop_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
                $table->foreignId('client_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(
            'vehicles',
            function (Blueprint $table) {
                $table->dropForeign(['model_id']);
                $table->dropForeign(['workshop_id']);
                $table->dropForeign(['client_id']);
            }
        );
    }
};
