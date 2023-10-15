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
        Schema::create('models', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->unsignedBigInteger('mark_id');
            $table
                ->foreign('mark_id')
                ->references('id')
                ->on('marks');
        });
        // Insert default model data
        DB::table('models')->insert([
            [
                'model' => 'Model A',
                'mark_id' => 1,
            ],
            [
                'model' => 'Model B',
                'mark_id' => 2,
            ],
            [
                'model' => 'Model C',
                'mark_id' => 3,
            ],
            // Add more default model data as needed
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('models');
    }
};
