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
        Schema::create('subscription_client', function (Blueprint $table) {
            $table->date('subscription_date');
            $table->string('client_full_name');

            $table->primary(['subscription_date', 'client_full_name']);

            $table->foreign('subscription_date')->references('date')->on('subscriptions')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('client_full_name')->references('full_name')->on('clients')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_client');
    }
};
