<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('statements',
            function (Blueprint $table) {
                $table->foreign(['client_uuid'], 'statements_ibfk_1')->references(['uuid'])->on('clients')->cascadeOnDelete();
                $table->foreign(['request_uuid'], 'statements_ibfk_3')->references(['uuid'])->on('requests')->cascadeOnDelete();
                $table->foreign(['vehicle_uuid'], 'statements_ibfk_2')->references(['uuid'])->on('vehicles')->cascadeOnDelete();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('statements',
            function (Blueprint $table) {
                $table->dropForeign('statements_ibfk_1');
                $table->dropForeign('statements_ibfk_3');
                $table->dropForeign('statements_ibfk_2');
            });
    }
};
