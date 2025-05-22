<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('car_category_id');
            $table->unsignedBigInteger('car_location_id');
            $table->unsignedBigInteger('car_model_id'); // Ensure this is unsignedBigInteger
            $table->string('year')->nullable();
            $table->string('beam')->nullable();
            $table->string('transmission')->nullable();
            $table->string('rent')->nullable();
            $table->string('seats')->nullable();
            $table->string('weight')->nullable();
            $table->string('doors')->nullable();
            $table->string('mileage')->nullable();
            $table->string('engine_size')->nullable();
            $table->longText('detail')->nullable();
            $table->string('luggage')->nullable();
            $table->string('drive')->nullable();
            $table->string('fuel_economy')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('exterior_color')->nullable();
            $table->string('interior_color')->nullable();
            $table->string('lisence_plate')->nullable()->unique();
            $table->string('thumbnail')->nullable();
            $table->json('images')->nullable();
            $table->text('features')->nullable();
            $table->tinyInteger('is_featured')->default(0);
            $table->tinyInteger('status')->default(1)->nullable();
            $table->dateTime('date_added')->nullable();
            $table->enum('upload_type', ['calendar', 'manual',' api'])->default('manual');
            $table->timestamps();
        
            // Foreign keys with proper cascading behavior
            $table->foreign('car_category_id')->references('id')->on('car_categories')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('car_model_id')->references('id')->on('car_models')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('car_location_id')->references('id')->on('car_locations')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
        
        
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
