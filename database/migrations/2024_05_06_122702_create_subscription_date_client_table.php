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
        Schema::create('subscription_date_client', function (Blueprint $table) {
            $table->date('subscription_date');
            $table->string('client_fullname');

            $table->primary(['subscription_date', 'client_fullname']);

            $table->foreign('subscription_date')->references('subscription_date')->on('subscriptions')->cascadeOnDelete();
            $table->foreign('client_fullname')->references('full_name')->on('client')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_date_client');
    }
};
