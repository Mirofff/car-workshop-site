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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->decimal('price', 10, 2);
            $table->text('complaints');
            $table->enum('status', ['new', 'in progress', 'done'])->default('new');

            $table
                ->foreign('order_id')
                ->references('id')
                ->on('users');
        });
        // Insert default service data
        DB::table('services')->insert([
            [
                'order_id' => 1,
                'price' => 100.0,
                'complaints' => 'Complaint 1',
                'status' => 'new',
            ],
            [
                'order_id' => 2,
                'price' => 75.5,
                'complaints' => 'Complaint 2',
                'status' => 'in progress',
            ],
            [
                'order_id' => 3,
                'price' => 150.25,
                'complaints' => 'Complaint 3',
                'status' => 'done',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
