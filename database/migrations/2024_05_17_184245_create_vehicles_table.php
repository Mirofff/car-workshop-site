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
        Schema::create(
            'vehicles',
            function (Blueprint $table) {
                $table->unsignedBigInteger('id', true);
                $table->string('registration_plate', 20);
                $table->dateTime('created_at');
                $table->dateTime('updated_at');
                $table->boolean('is_active')->default(true);
                $table->string('vin');
                $table->string('engine');
                $table->text('tech_passport')->nullable();
                $table->integer('mileage');
                $table->string('color');
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
