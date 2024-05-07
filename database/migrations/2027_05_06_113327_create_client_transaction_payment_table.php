<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('client_transaction_payment', function (Blueprint $table) {
            $table->string('client_full_name');
            $table->string('transaction_id');
            $table->string('payment_name');

            $table->primary(['client_full_name', 'transaction_id', 'payment_name']);

            $table->foreign('client_full_name')->references('full_name')->on('clients')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('transaction_id')->references('transaction_id')->on('transactions')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('payment_name')->references('name')->on('payments')->cascadeOnUpdate()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_transaction_payment');
    }
};
