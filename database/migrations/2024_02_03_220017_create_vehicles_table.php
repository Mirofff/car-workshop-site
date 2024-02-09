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
        Schema::create('vehicles',
            function (Blueprint $table) {
                $table->uuid()->default('uuid()')->primary();
                $table->string('registration_plate', 20);
                $table->dateTime('created_at');
                $table->dateTime('updated_at');
                $table->mediumInteger('model_id')->index('model_id');
                $table->uuid('workshop_uuid')->index('workshop_uuid');
                $table->uuid('user_uuid')->index('user_uuid');
                $table->boolean('is_active')->default(true);
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};
