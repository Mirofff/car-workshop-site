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
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->string('mark');
        });

        // Insert default mark data
        DB::table('marks')->insert([
            [
                'mark' => 'Mark A',
            ],
            [
                'mark' => 'Mark B',
            ],
            [
                'mark' => 'Mark C',
            ],
            // Add more default mark data as needed
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marks');
    }
};
