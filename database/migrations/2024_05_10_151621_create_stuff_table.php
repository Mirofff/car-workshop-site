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
        Schema::create('stuff', function (Blueprint $table) {
            $table->char('workshop_uuid', 36)->index('workshop_uuid');
            $table->enum('role', ['admin', 'operator']);
            $table->string('first_name', 45);
            $table->string('second_name', 45)->nullable();
            $table->string('last_name', 45);
            $table->boolean('is_active')->default(true);
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->char('uuid', 36)->primary();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stuff');
    }
};
