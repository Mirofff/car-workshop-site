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
        Schema::table('requests',
            function (Blueprint $table) {
                $table->foreign(['client_uuid'], 'requests_ibfk_1')->references(['uuid'])->on('clients');
                $table->foreign(['vehicle_uuid'], 'requests_ibfk_2')->references(['uuid'])->on('vehicles');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requests',
            function (Blueprint $table) {
                $table->dropForeign('requests_ibfk_1');
                $table->dropForeign('requests_ibfk_2');
            });
    }
};
