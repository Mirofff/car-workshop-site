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
        Schema::create('requests',
            function (Blueprint $table) {
                $table->uuid()->default('uuid()')->primary();
                $table->date('datetime');
                $table->text('comment');
                $table->dateTime('created_at');
                $table->dateTime('updated_at');
                $table->uuid('client_uuid')->index('client_uuid');
                $table->uuid('vehicle_uuid')->index('vehicle_uuid');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
};
