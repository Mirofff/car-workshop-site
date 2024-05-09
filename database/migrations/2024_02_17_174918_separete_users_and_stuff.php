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
        Schema::table('stuff',
            function (Blueprint $table) {
                $table->string('first_name', 45);
                $table->string('second_name', 45)->nullable();
                $table->string('last_name', 45);
                $table->boolean('is_active')->default(true);
                $table->string('email')->unique();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
                $table->dropForeign('stuff_ibfk_2');
                $table->dropColumn('client_uuid');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stuff',
            function (Blueprint $table) {
                $table->dropColumn('first_name');
                $table->dropColumn('second_name');
                $table->dropColumn('last_name');
                $table->dropColumn('is_active');
                $table->dropColumn('email');
                $table->dropColumn('password');
                $table->dropColumn('remember_token');
                $table->dropColumn('created_at');
                $table->dropColumn('updated_at');
                $table->uuid('client_uuid');
                $table->foreign(['client_uuid'], 'stuff_ibfk_2')->references(['uuid'])->on('clients')->cascadeOnDelete();
            });
    }
};
