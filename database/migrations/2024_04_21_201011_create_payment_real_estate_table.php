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
        Schema::create('payment_request', function (Blueprint $table) {
            $table->string('request_requirements');
            $table->date('payment_date');
            $table->string('client_full_name');

            $table->primary(['request_requirements', 'payment_date', 'client_full_name']);
            $table->foreign('request_requirements')->references('requirements')->on('requests');
            $table->foreign(['payment_date', 'client_full_name'])->references(['date', 'client_full_name'])->on('payments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_request');
    }
};
