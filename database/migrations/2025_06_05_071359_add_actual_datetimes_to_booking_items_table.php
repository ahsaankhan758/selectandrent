<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddActualDatetimesToBookingItemsTable extends Migration
{
    public function up()
    {
        Schema::table('booking_items', function (Blueprint $table) {
            $table->dateTime('actual_pickup_datetime')->nullable()->after('pickup_datetime');
            $table->dateTime('actual_dropoff_datetime')->nullable()->after('dropoff_datetime');
        });
    }

    public function down()
    {
        Schema::table('booking_items', function (Blueprint $table) {
            $table->dropColumn('actual_pickup_datetime');
            $table->dropColumn('actual_dropoff_datetime');
        });
    }
}

