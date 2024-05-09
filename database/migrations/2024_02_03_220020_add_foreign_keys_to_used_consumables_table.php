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
        Schema::table('used_consumables',
            function (Blueprint $table) {
                $table->foreign(['statement_uuid'], 'used_consumables_ibfk_1')->references(['uuid'])->on('statements')->cascadeOnDelete();
                $table->foreign(['consumable_uuid'], 'used_consumables_ibfk_2')->references(['uuid'])->on('consumables')->cascadeOnDelete();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('used_consumables',
            function (Blueprint $table) {
                $table->dropForeign('used_consumables_ibfk_1');
                $table->dropForeign('used_consumables_ibfk_2');
            });
    }
};
