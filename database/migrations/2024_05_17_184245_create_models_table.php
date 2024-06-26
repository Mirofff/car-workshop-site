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
            'models',
            function (Blueprint $table) {
                $table->unsignedBigInteger('id', true);
                $table->string('name', 45);
                $table->enum('type', ['bike', 'car'])->nullable();
                $table->date('year')->nullable();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('models');
    }
};
