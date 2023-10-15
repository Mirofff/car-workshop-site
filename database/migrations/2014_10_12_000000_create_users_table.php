<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('email')->unique();
            $table->string('first_name');
            $table->string('second_name');
            $table->string('last_name');
            $table->string('phone');
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_operator')->default(false);
            $table->string('password');
            $table->rememberToken();
        });

        DB::table('users')->insert([
            [
                'email' => 'admin@example.com',
                'first_name' => 'Admin',
                'second_name' => 'Super',
                'last_name' => 'User',
                'phone' => '123-456-7890',
                'is_admin' => true,
                'is_operator' => false,
                'password' => 'Pa$$w0rd',
            ],
            [
                'email' => 'operator@example.com',
                'first_name' => 'Operator',
                'second_name' => 'HihiHaha',
                'last_name' => 'Operator',
                'phone' => '123-456-7890',
                'is_admin' => false,
                'is_operator' => true,
                'password' => 'Pa$$w0rd',
            ],
            [
                'email' => 'user@example.com',
                'first_name' => 'User',
                'second_name' => 'NotSuper',
                'last_name' => 'User',
                'phone' => '123-456-7890',
                'is_admin' => false,
                'is_operator' => false,
                'password' => 'Pa$$w0rd',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
