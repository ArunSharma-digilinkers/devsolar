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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // User Info
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            // Billing Address
            $table->text('address')->nullable();
            $table->string('pincode', 10)->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('gstin')->nullable();

            // Shipping Address
            $table->string('shipping_name')->nullable();
            $table->string('shipping_phone')->nullable();
            $table->text('shipping_address')->nullable();
            $table->string('shipping_pincode', 10)->nullable();
            $table->string('shipping_state')->nullable();
            $table->string('shipping_city')->nullable();

            // Pricing
            $table->decimal('subtotal', 10, 2)->default(0);
            $table->decimal('gst_total', 10, 2)->default(0);
            $table->decimal('shipping_amount', 10, 2)->default(0);
            $table->decimal('shipping_gst', 10, 2)->default(0);
            $table->decimal('discount_amount', 10, 2)->default(0);
            $table->decimal('total_amount', 10, 2)->default(0);

            // Coupon
            $table->unsignedBigInteger('coupon_id')->nullable();

            // Payment
            $table->string('payment_method')->nullable();
            $table->string('payment_status')->default('pending');
            $table->string('payment_id')->nullable();

            // Order Info
            $table->string('invoice_number')->nullable();
            $table->string('status')->default('pending');

            $table->timestamps();

            // Optional Foreign Keys
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};