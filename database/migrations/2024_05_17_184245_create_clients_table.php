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
            'clients',
            function (Blueprint $table) {
                $table->unsignedBigInteger('id', true);
                $table->string('first_name', 45);
                $table->string('second_name', 45)->nullable();
                $table->string('last_name', 45);
                $table->boolean('is_active')->default(true);
                $table->string('email')->unique();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
