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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_category_id');
            $table->unsignedBigInteger('car_location_id');
            $table->unsignedBigInteger('car_model_id');
            $table->string('year')->nullable()->nullable();
            $table->string('beam')->nullable()->nullable();
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
            $table->string('lisence_plate')->nullable();
            $table->string('thumbnail')->nullable();
            $table->json('images')->nullable();
            $table->string('features');
            $table->timestamps();
            $table->foreign('car_category_id')->references('id')->on('car_categories')->onDelete('NO ACTION')->onUpdate('cascade');
            $table->foreign('car_model_id')->references('id')->on('car_models')->onDelete('NO ACTION')->onUpdate('cascade');
            $table->foreign('car_location_id')->references('id')->on('car_locations')->onDelete('NO ACTION')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
