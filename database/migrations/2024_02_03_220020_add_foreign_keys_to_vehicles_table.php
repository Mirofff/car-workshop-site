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
        Schema::table('vehicles',
            function (Blueprint $table) {
                $table->foreign(['model_id'], 'vehicles_ibfk_1')->references(['id'])->on('models');
                $table->foreign(['user_uuid'], 'vehicles_ibfk_3')->references(['uuid'])->on('users');
                $table->foreign(['workshop_uuid'], 'vehicles_ibfk_2')->references(['uuid'])->on('workshops');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicles',
            function (Blueprint $table) {
                $table->dropForeign('vehicles_ibfk_1');
                $table->dropForeign('vehicles_ibfk_3');
                $table->dropForeign('vehicles_ibfk_2');
            });
    }
};
