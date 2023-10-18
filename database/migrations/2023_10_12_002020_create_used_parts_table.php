<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('used_parts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('quantity');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('part_id');

            $table
                ->foreign('order_id')
                ->references('id')
                ->on('orders');
            $table
                ->foreign('part_id')
                ->references('id')
                ->on('parts');
        });
        // Insert default used parts data
        DB::table('used_parts')->insert([
            [
                'created_at' => now(),
                'quantity' => 5,
                'order_id' => 1,
                'part_id' => 1,
            ],
            [
                'created_at' => now(),
                'quantity' => 3,
                'order_id' => 2,
                'part_id' => 2,
            ],
            [
                'created_at' => now(),
                'quantity' => 2,
                'order_id' => 3,
                'part_id' => 3,
            ],
            // Add more default used parts data as needed
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('used_parts');
    }
};
