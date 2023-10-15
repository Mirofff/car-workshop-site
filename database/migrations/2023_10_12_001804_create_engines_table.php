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
        Schema::create('engines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('volume');
            $table->integer('power');
        });

        // Insert default engine data
        DB::table('engines')->insert([
            [
                'name' => 'Engine 1',
                'volume' => 2.0,
                'power' => 150,
            ],
            [
                'name' => 'Engine 2',
                'volume' => 1.6,
                'power' => 120,
            ],
            [
                'name' => 'Engine 3',
                'volume' => 2.5,
                'power' => 200,
            ],
            [
                'name' => 'Engine 4',
                'volume' => 1.8,
                'power' => 160,
            ],
            [
                'name' => 'Engine 5',
                'volume' => 2.4,
                'power' => 180,
            ],
            [
                'name' => 'Engine 6',
                'volume' => 2.2,
                'power' => 170,
            ],
            [
                'name' => 'Engine 7',
                'volume' => 1.5,
                'power' => 110,
            ],
            [
                'name' => 'Engine 8',
                'volume' => 3.0,
                'power' => 250,
            ],
            [
                'name' => 'Engine 9',
                'volume' => 1.6,
                'power' => 130,
            ],
            [
                'name' => 'Engine 10',
                'volume' => 2.0,
                'power' => 140,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('engines');
    }
};
