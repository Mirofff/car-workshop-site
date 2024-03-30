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
        Schema::table('vehicles',
            function (Blueprint $table) {
                $table->string('vin');
                $table->string('engine');
                $table->text('tech_passport')->nullable();
                $table->integer('mileage');
                $table->string('color');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehicles',
            function (Blueprint $table) {
                $table->dropColumn('vin');
                $table->dropColumn('engine');
                $table->dropColumn('tech_passport');
                $table->dropColumn('mileage');
                $table->dropColumn('color');
            });
    }
};
