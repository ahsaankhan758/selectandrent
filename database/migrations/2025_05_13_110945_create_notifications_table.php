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

            $table->unsignedTinyInteger('notification_type')->comment('1- company add vehicle, 2- customer placed orders, 3- order cancelled from company, 4- admin approved company');
            $table->unsignedBigInteger('from_user_id');
            $table->unsignedBigInteger('to_user_id');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->text('notification_text');
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
