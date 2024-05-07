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
        Schema::create('subscription_category', function (Blueprint $table) {
            $table->date('subscription_date');
            $table->string('category_name');

            $table->primary(['subscription_date']);

            $table->foreign('subscription_date')->references('date')->on('subscriptions')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('category_name')->references('name')->on('categories')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_category');
    }
};
