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
        Schema::create('payment_terminal', function (Blueprint $table) {
            $table->string('payment_name');
            $table->unsignedInteger('terminal_internal_number');

            $table->primary(['payment_name', 'terminal_internal_number']);

            $table->foreign('payment_name')->references('name')->on('payments')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('terminal_internal_number')->references('internal_number')->on('terminals')->cascadeOnUpdate()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_terminal');
    }
};
