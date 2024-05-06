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
        Schema::create('ticket_worker', function (Blueprint $table) {
            $table->date('ticket_date');
            $table->string('worker_full_name');

            $table->primary(['ticket_date', 'worker_full_name']);

            $table->foreign('worker_full_name')->references('full_name')->on('workers')->cascadeOnDelete();
            $table->foreign('ticket_date')->references('date')->on('tickets')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_worker');
    }
};
