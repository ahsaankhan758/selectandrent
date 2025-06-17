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
        Schema::create('customer_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('c_user_id');
            $table->unsignedBigInteger('booking_id');
            $table->float('rating', 3, 1);
            $table->text('comment')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('NO ACTION')->onUpdate('cascade');
            $table->foreign('c_user_id')->references('id')->on('users')->onDelete('NO ACTION')->onUpdate('cascade');
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('NO ACTION')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_reviews');
    }
};
