<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExistingCustomerToContactsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::table('contacts', function (Blueprint $table) {
        $table->string('existing_customer')->nullable()->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('existing_customer');
        });
    }
}
