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
        Schema::create('name_terminal', function (Blueprint $table) {
            $table->string('payment_name');
            $table->unsignedInteger('number');

            $table->primary(['payment_name', 'number']);

            $table->foreign('payment_name')->references('name')->on('payments')->cascadeOnDelete();
            $table->foreign('number')->references('internal_number')->on('terminals')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('name_terminal');
    }
};
