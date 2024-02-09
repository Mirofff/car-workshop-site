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
        Schema::table('models',
            function (Blueprint $table) {
                $table->foreign(['mark_id'], 'models_ibfk_1')->references(['id'])->on('marks');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('models',
            function (Blueprint $table) {
                $table->dropForeign('models_ibfk_1');
            });
    }
};
