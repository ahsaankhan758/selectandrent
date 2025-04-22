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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('booking_reference')->unique();
            $table->decimal('subtotal', 10, 2)->nullable();
            $table->decimal('total_price', 10, 2);
            $table->string('transaction_id')->nullable();
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');
            $table->enum('booking_status', ['without-payment','pending','confirmed','cancelled','completed'])->default('pending');
            $table->string('payment_method')->nullable();
            $table->string('coupon_code')->nullable();
            $table->decimal('discount_amount', 10, 2)->nullable();
            $table->decimal('tax_amount', 10, 2)->nullable();
            $table->tinyInteger('insurance_included')->default(0);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
