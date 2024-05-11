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
        Schema::create('statements', function (Blueprint $table) {
            $table->char('uuid', 36)->default('uuid()')->primary();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->enum('status', ['complete', 'not_complete']);
            $table->char('request_uuid', 36)->index('request_uuid');
            $table->char('client_uuid', 36)->index('client_uuid');
            $table->char('vehicle_uuid', 36)->index('vehicle_uuid');
            $table->boolean('is_active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statements');
    }
};
