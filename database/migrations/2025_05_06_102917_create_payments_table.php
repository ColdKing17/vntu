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
        Schema::create('payments', function (Blueprint $table) {
            $table->string('name');
            $table->string('supported_currency_symbol');
            $table->string('security_level');
            $table->unsignedInteger('max_sum');
            $table->unsignedInteger('commission');

            $table->primary('name');

            $table->foreign('supported_currency_symbol')->references('symbol')->on('currencies')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
