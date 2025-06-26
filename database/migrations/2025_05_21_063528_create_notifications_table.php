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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
 
            $table->unsignedTinyInteger('type')->comment('1- feedback to customer, 2- customer placed orders, 3- order cancelled , 4- register company, 5- feedback from customers, 6- Refund');
            $table->unsignedBigInteger('from_user_id');
            $table->unsignedBigInteger('to_user_id');
            $table->unsignedBigInteger('user_id');
            $table->text('text');
            $table->unsignedTinyInteger('status')->default(0)->comment('0 = unread, 1 = read');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
