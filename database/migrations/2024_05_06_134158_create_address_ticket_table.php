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
        Schema::create('address_ticket', function (Blueprint $table) {
            $table->string('address');
            $table->unsignedInteger('ticket');
            $table->primary(['address', 'ticket']);

            $table->foreign('address')->references('address')->on('offices');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address_ticket');
    }
};
