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
        Schema::create('shipping_zones', function (Blueprint $table) {
            $table->id();

            // Zone Info
            $table->string('name');

            // Store multiple states as JSON
            $table->json('states');

            // Pricing
            $table->decimal('rate', 8, 2)->default(1.00); // multiplier (1 = base, 1.2 = +20%)
            $table->decimal('free_above', 10, 2)->nullable(); // free shipping threshold

            // Status
            $table->boolean('status')->default(true);

            $table->timestamps();

            // Optional index for performance
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_zones');
    }
};