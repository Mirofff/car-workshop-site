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
            'engines',
            function (Blueprint $table) {
                $table->unsignedBigInteger('id', true);
                $table->unsignedBigInteger('other_id');
                $table->unsignedBigInteger('automobile_id');
                $table->string('name')->index('name');
                $table->longText('specs')->nullable();
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('engines');
    }
};
