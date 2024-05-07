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
            $table->unsignedDouble('amount');
            $table->date('date');
            $table->string('payment_method');
            $table->string('client_full_name');
            $table->string('real_estate_address');

            $table->primary(['date', 'client_full_name', 'real_estate_address']);
            $table->foreign('real_estate_address')->references('address')->on('real_estates')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('client_full_name')->references('full_name')->on('clients')->cascadeOnUpdate()->cascadeOnDelete();
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
