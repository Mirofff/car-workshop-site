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
        Schema::create('models',
            function (Blueprint $table) {
                $table->mediumInteger('id', true);
                $table->string('name', 45);
                $table->enum('type', ['bike', 'car'])->nullable();
                $table->date('year')->nullable();
                $table->integer('mark_id')->index('mark_id');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('models');
    }
};
