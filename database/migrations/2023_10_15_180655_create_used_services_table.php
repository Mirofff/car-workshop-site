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
        Schema::create('used_services', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('quantity');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('service_id');

            $table
                ->foreign('order_id')
                ->references('id')
                ->on('orders');
            $table
                ->foreign('service_id')
                ->references('id')
                ->on('services');
        });

        // Insert default used services data
        DB::table('used_services')->insert([
            [
                'created_at' => now(),
                'quantity' => 3,
                'order_id' => 1,
                'service_id' => 1,
            ],
            [
                'created_at' => now(),
                'quantity' => 2,
                'order_id' => 2,
                'service_id' => 2,
            ],
            [
                'created_at' => now(),
                'quantity' => 4,
                'order_id' => 3,
                'service_id' => 3,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('used_services');
    }
};
