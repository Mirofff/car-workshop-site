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
        Schema::table('clients',
            function (Blueprint $table) {
                $table->dropColumn('role');
            });

        Schema::table('stuff',
            function (Blueprint $table) {
                $table->enum('role', ['admin', 'operator']);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clients',
            function (Blueprint $table) {
                $table->enum('role', ['client', 'admin', 'operator']);
            });
        Schema::table('stuff',
            function (Blueprint $table) {
                $table->dropColumn('role');
            });
    }
};
