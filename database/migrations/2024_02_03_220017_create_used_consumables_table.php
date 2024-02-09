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
        Schema::create('used_consumables',
            function (Blueprint $table) {
                $table->uuid()->default('uuid()')->primary();
                $table->dateTime('created_at');
                $table->dateTime('updated_at');
                $table->uuid('claim_uuid')->index('claim_uuid');
                $table->uuid('consumable_uuid')->index('consumable_uuid');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('used_consumables');
    }
};
