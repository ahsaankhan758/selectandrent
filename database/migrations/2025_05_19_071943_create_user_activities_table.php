<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 
     */
        public function up()
{
    Schema::create('user_activities', function (Blueprint $table) {
        $table->id();
        $table->string('ip_address')->nullable();
        $table->string('browser')->nullable();
        $table->string('url')->nullable();
        $table->unsignedBigInteger('user_id')->nullable();
        $table->string('method')->nullable();
        $table->text('referrer')->nullable();
        $table->string('action_type')->default('view'); 
        $table->string('element_clicked')->nullable();  
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_activities');
    }
};
