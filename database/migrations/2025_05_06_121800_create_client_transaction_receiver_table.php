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
        Schema::create('transaction_receiver', function (Blueprint $table) {
            $table->string('transaction_id');
            $table->string('receiver');

            $table->primary(['transaction_id', 'receiver']);

            $table->foreign('transaction_id')->references('transaction_id')->on('transactions')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_receiver');
    }
};
