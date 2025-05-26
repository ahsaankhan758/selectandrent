<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('cars', function (Blueprint $table) {
       $table->integer('advance_deposit')->nullable()->after('mileage');
        $table->integer('min_age')->nullable()->after('advance_deposit');
        $table->enum('rent_type', ['day', 'hour'])->default('day')->after('min_age');
    });
}

public function down()
{
    Schema::table('cars', function (Blueprint $table) {
        $table->dropColumn(['advance_deposit', 'min_age', 'rent_type']);
    });
}

};
