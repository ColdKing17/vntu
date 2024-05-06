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
            $table->string('category');
            $table->primary(['subscription_date', 'category']);
            $table->foreign('category')->references('name')->on('categories')->cascadeOnDelete();
            $table->foreign('subscription_date')->references('subscription_date')->on('subscriptions')->cascadeOnDelete();
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
