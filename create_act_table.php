<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('acts', function (Blueprint $table) {
            $table->id();
            $table->datetime('registration_datetime')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->datetime('start_datetime');
            $table->timestamps('end_datetime');
            $table->string('further_maintenance_details')->comment('Рекомендации по дальнейшей эксплуатации');
            $table->enum('payment_order', ['Безналичные', 'Наличные'])->comment('Тип оплаты');
            $table->uuid('cashier_id')->comment('Кассир');
            $table->uuid('cashier_id')->comment('Кассир');
            $table->uuid('customer_id')->comment('Клиент');
            $table->uuid('executor_id')->comment('Проверяющий комплектность транспортного средства');
            $table->uuid('checker_id')->comment('Проверяющий объем и качество выполненных работ');
            $table->foreign('cashier_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acts');
    }
};
