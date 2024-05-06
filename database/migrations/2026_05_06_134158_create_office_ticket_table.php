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
        Schema::create('office_ticket', function (Blueprint $table) {
            $table->string('office_address');
            $table->date('ticket_date');

            $table->primary(['office_address', 'ticket_date']);

            $table->foreign('office_address')->references('address')->on('offices')->cascadeOnDelete();
            $table->foreign('ticket_date')->references('date')->on('tickets')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('office_ticket');
    }
};
