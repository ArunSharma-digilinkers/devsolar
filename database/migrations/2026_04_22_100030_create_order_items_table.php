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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

            // Relations
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');

            // Product Details
            $table->integer('quantity')->default(1);
            $table->decimal('price', 10, 2)->default(0);
            $table->decimal('base_price', 10, 2)->default(0);

            // GST
            $table->decimal('gst_percentage', 5, 2)->default(0);
            $table->decimal('gst_amount', 10, 2)->default(0);

            // Discount & Total
            $table->decimal('discount_amount', 10, 2)->default(0);
            $table->decimal('total_price', 10, 2)->default(0);

            // Serial (for products like batteries, electronics, etc.)
            $table->string('serial_number')->nullable();

            // Courier / Dispatch Info
            $table->string('courier_name')->nullable();
            $table->string('tracking_number')->nullable();
            $table->date('dispatch_date')->nullable();

            $table->timestamps();

            // Indexes
            $table->index('order_id');
            $table->index('product_id');

            // Foreign Keys (recommended)
            // $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            // $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};