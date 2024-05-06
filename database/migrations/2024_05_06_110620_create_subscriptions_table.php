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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->date('date');
            $table->unsignedDouble('amount');
            $table->string('payment_method');
            $table->unsignedInteger('duration');
            $table->string('currency_symbol');

            $table->primary('date');

            $table->foreign('currency_symbol')->references('symbol')->on('currencies')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
