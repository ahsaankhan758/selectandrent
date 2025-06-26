<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

       User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$12$NS.jnyXsiIZRN4B14CUWtuhLCs2NTLnZFAALgm5AuHd0xT/2ovoDm',
            'status' => 1,
            'role' => 'admin',
        ]);
        $this->call(LanguageSeeder::class);
        $this->call(CurrencySeeder::class);
    }
}
