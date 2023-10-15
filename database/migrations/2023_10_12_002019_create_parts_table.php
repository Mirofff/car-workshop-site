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
        Schema::create('parts', function (Blueprint $table) {
            $table->id();
            $table->enum('unit', ['thing', 'liter', 'gram']);
            $table->string('name');
            $table->decimal('price', 10, 2);
        });

        // Insert default part data
        DB::table('parts')->insert([
            [
                'unit' => 'thing',
                'name' => 'Part A',
                'price' => 234.99,
            ],
            [
                'unit' => 'liter',
                'name' => 'Part B',
                'price' => 53242.49,
            ],
            [
                'unit' => 'gram',
                'name' => 'Part C',
                'price' => 92847.99,
            ],
            // Add more default part data as needed
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parts');
    }
};
