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
        Schema::create('users',
            function (Blueprint $table) {
                $table->uuid()->default('uuid()')->primary();
                $table->string('first_name', 45);
                $table->string('second_name', 45)->nullable();
                $table->string('last_name', 45);
                $table->boolean('is_active')->default(true);
                $table->enum('role', ['client', 'admin', 'operator']);
                $table->string('email')->unique();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
