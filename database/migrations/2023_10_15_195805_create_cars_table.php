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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('license_plate');
            $table->string('vin');
            $table->integer('year');
            $table->integer('mileage');
            $table->string('register_sign');
            $table->unsignedBigInteger('model_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('engine_id');

            $table
                ->foreign('engine_id')
                ->references('id')
                ->on('engines');
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users');
            $table
                ->foreign('model_id')
                ->references('id')
                ->on('models');
        });

        // Insert default car data
        DB::table('cars')->insert([
            [
                'created_at' => now(),
                'license_plate' => 'ABC123',
                'vin' => '1234567890ABCDEF',
                'year' => 2020,
                'mileage' => 50000,
                'register_sign' => 'XYZ987',
                'model_id' => 1,
                'user_id' => 1,
                'engine_id' => 1,
            ],
            [
                'created_at' => now(),
                'license_plate' => 'DEF456',
                'vin' => '9876543210ABCDEF',
                'year' => 2019,
                'mileage' => 60000,
                'register_sign' => 'LMN321',
                'model_id' => 2,
                'user_id' => 2,
                'engine_id' => 2,
            ],
            [
                'created_at' => now(),
                'license_plate' => 'GHI789',
                'vin' => '4567890123ABCDEF',
                'year' => 2018,
                'mileage' => 70000,
                'register_sign' => 'PQR654',
                'model_id' => 3,
                'user_id' => 3,
                'engine_id' => 3,
            ],
            // Add more default car data as needed
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
