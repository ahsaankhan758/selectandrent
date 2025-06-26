<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Add refunded_by column
            $table->foreignId('refunded_by')->nullable()->after('notes')->constrained('users')->nullOnDelete();
            $table->text('refunded_note')->nullable()->after('refunded_by');
        });

        // Modify ENUM values for payment_status
        DB::statement("ALTER TABLE bookings MODIFY COLUMN payment_status ENUM('pending', 'paid', 'failed', 'refunded') DEFAULT 'pending'");

        // Modify ENUM values for booking_status
        DB::statement("ALTER TABLE bookings MODIFY COLUMN booking_status ENUM('pending', 'confirmed', 'cancelled', 'completed', 'refunded') DEFAULT 'pending'");
    }

    // public function down(): void
    // {
    //     Schema::table('bookings', function (Blueprint $table) {
    //         // Drop refunded_by column
    //         $table->dropColumn('refunded_by');
    //     });

    //     // Revert ENUM changes
    //     DB::statement("ALTER TABLE bookings MODIFY COLUMN payment_status ENUM('pending', 'paid', 'failed') DEFAULT 'pending'");
    //     DB::statement("ALTER TABLE bookings MODIFY COLUMN booking_status ENUM('pending', 'confirmed', 'cancelled', 'completed') DEFAULT 'pending'");
    // }
    // add by farhan
    public function down(): void
{
    Schema::table('bookings', function (Blueprint $table) {
        // 👇 First drop the foreign key constraint
        $table->dropForeign(['refunded_by']); // this drops the constraint named 'bookings_refunded_by_foreign'

        // 👇 Then drop the refunded_by and refunded_note columns
        $table->dropColumn(['refunded_by', 'refunded_note']);
    });

    // Revert ENUM changes
    DB::statement("ALTER TABLE bookings MODIFY COLUMN payment_status ENUM('pending', 'paid', 'failed') DEFAULT 'pending'");
    DB::statement("ALTER TABLE bookings MODIFY COLUMN booking_status ENUM('pending', 'confirmed', 'cancelled', 'completed') DEFAULT 'pending'");
}

};
