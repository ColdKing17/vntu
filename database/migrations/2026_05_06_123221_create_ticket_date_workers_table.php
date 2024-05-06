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
        Schema::create('ticket_date_workers', function (Blueprint $table) {
            $table->date('ticket_date');
            $table->string('worker');

            $table->primary(['ticket_date', 'worker']);
            $table->foreign('worker')->references('fullname')->on('workers')->cascadeOnDelete();
            $table->foreign('ticket_date')->references('ticket_date')->on('ticket')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_date_workers');
    }
};
