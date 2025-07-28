<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\company;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\CurrencySeeder;
use Database\Seeders\LanguageSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$12$NS.jnyXsiIZRN4B14CUWtuhLCs2NTLnZFAALgm5AuHd0xT/2ovoDm',
            'status' => 1,
            'role' => 'admin',
        ]);

        company::create([
            'user_id' => $user->id,
            'company_profile' => null,
            'country_id' => 1,
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => null,
            'website' => null,
            'detail' => null,
            'status' => 1,
        ]);

         DB::table('payment_gateways')->insert([
            [
                'name' => 'Paypal',
                'status' => 1,
                'order' => 1
            ],
            [
                'name' => 'Stripe',
                'status' => 1,
                'order' => 2
            ]
        ]);
        $this->call(LanguageSeeder::class);
        $this->call(CurrencySeeder::class);
    }
}
