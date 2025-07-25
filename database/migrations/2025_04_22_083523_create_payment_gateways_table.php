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
        Schema::create('payment_gateways', function (Blueprint $table) {
            $table->id(); 
            $table->string('name'); 
            $table->text('c1')->nullable(); 
            $table->text('c2')->nullable(); 
            $table->text('c3')->nullable();
            $table->text('c4')->nullable(); 
            $table->text('c5')->nullable(); 
            $table->boolean('dev')->default(1); 
            $table->text('dev_endpoint')->nullable(); 
            $table->text('pro_endpoint')->nullable(); 
            $table->boolean('status')->default(1); 
            $table->integer('order')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_gateways');
    }
};
