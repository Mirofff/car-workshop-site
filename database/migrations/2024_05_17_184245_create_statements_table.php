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
            'statements',
            function (Blueprint $table) {
                $table->unsignedBigInteger('id', true);
                $table->dateTime('created_at');
                $table->dateTime('updated_at');
                $table->enum('status', ['complete', 'not_complete'])->default('not_complete');
                $table->string('comment', 4096);
                $table->boolean('is_active')->default(true);
                $table->date('registration_date')->nullable();
                $table->date('execution_date')->nullable();
                $table->dateTime('pickup_time');
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statements');
    }
};
