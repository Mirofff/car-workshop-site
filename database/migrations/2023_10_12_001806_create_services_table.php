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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->decimal('price', 10, 2);
            $table->text('name');
            $table->enum('status', ['new', 'in progress', 'done'])->default('new');
        });
        // Insert default service data
        DB::table('services')->insert([
            [
                'price' => 100.0,
                'name' => 'Complaint 1',
                'status' => 'new',
            ],
            [
                'price' => 75.5,
                'name' => 'Complaint 2',
                'status' => 'in progress',
            ],
            [
                'price' => 150.25,
                'name' => 'Complaint 3',
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
