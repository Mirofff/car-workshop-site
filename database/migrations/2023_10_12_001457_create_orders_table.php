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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('date')->default(now()->toDateString());
            $table->string('reason');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('car_id');
            $table->text('recommendations');
        });
        DB::table('orders')->insert([
            [
                'date' => now()->toDateString(),
                'reason' => 'Reason 1',
                'user_id' => 1,
                'car_id' => 1,
                'recommendations' => 'Recommendation 1',
            ],
            [
                'date' => now()->toDateString(),
                'reason' => 'Reason 2',
                'user_id' => 2,
                'car_id' => 2,
                'recommendations' => 'Recommendation 2',
            ],
            [
                'date' => now()->toDateString(),
                'reason' => 'Reason 3',
                'user_id' => 3,
                'car_id' => 3,
                'recommendations' => 'Recommendation 3',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
