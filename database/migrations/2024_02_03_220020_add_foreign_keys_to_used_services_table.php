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
        Schema::table('used_services',
            function (Blueprint $table) {
                $table->foreign(['claim_uuid'], 'used_services_ibfk_1')->references(['uuid'])->on('statements');
                $table->foreign(['service_uuid'], 'used_services_ibfk_2')->references(['uuid'])->on('services');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('used_services',
            function (Blueprint $table) {
                $table->dropForeign('used_services_ibfk_1');
                $table->dropForeign('used_services_ibfk_2');
            });
    }
};
