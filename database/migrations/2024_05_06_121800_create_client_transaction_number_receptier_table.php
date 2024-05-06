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
        Schema::create('client_transaction_number_receptier', function (Blueprint $table) {
            $table->string('transaction_number');
            $table->string('receptier');
            $table->primary('transaction_number');
            $table->primary('receptier');
            $table->foreign('transaction_number')->references('transaction_id')->on('transaction')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_transaction_number_receptier');
    }
};
