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
        Schema::create('requests', function (Blueprint $table) {
            $table->char('uuid', 36)->default('uuid()')->primary();
            $table->date('datetime')->unique();
            $table->text('comment');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->char('client_uuid', 36)->index('client_uuid');
            $table->char('vehicle_uuid', 36)->index('vehicle_uuid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
