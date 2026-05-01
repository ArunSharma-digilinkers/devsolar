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
        Schema::create('products', function (Blueprint $table) {
        $table->id();

        // Relationship
        $table->foreignId('category_id')->constrained()->onDelete('cascade');

        // Basic Info
        $table->string('name');
        $table->string('slug')->unique();

        // Pricing
        $table->decimal('price', 10, 2);
        $table->decimal('sale_price', 10, 2)->nullable();

        // GST
        $table->float('gst_percentage')->default(0);
        $table->enum('gst_type', ['inclusive', 'exclusive'])->default('inclusive');

        // Shipping
        $table->enum('shipping_type', ['free', 'extra'])->default('free');
        $table->decimal('shipping_rate', 10, 2)->default(0);

        // Content
        $table->text('short_description')->nullable();
        $table->longText('description')->nullable();
        $table->longText('technical_features')->nullable();
        $table->string('warranty')->nullable();

        // Inventory
        $table->integer('quantity')->default(0);

        // Extra
        $table->string('hsn_code')->nullable();

        // Flags
        $table->boolean('status')->default(1);
        $table->boolean('is_new_arrival')->default(0);

        // Images
        $table->string('image')->nullable(); // main image
        $table->json('images')->nullable(); // gallery images

        $table->timestamps();
     });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};