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
        Schema::table('stuff',
            function (Blueprint $table) {
                $table->foreign(['workshop_uuid'], 'stuff_ibfk_1')->references(['uuid'])->on('workshops')->cascadeOnDelete();
                $table->foreign(['client_uuid'], 'stuff_ibfk_2')->references(['uuid'])->on('clients')->cascadeOnDelete();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stuff',
            function (Blueprint $table) {
                $table->dropForeign('stuff_ibfk_1');
                $table->dropForeign('stuff_ibfk_2');
            });
    }
};
