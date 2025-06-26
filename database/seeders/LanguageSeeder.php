<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('languages')->insert([
            [
                'id' => 1,
                'name' => 'English',
                'code' => 'en',
                'flag_code' => 'gb',
                'is_default' => 'Yes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'عربي',
                'code' => 'ar',
                'flag_code' => 'sa',
                'is_default' => 'No',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Français',
                'code' => 'fr',
                'flag_code' => 'fr',
                'is_default' => 'No',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Dutch',
                'code' => 'nl',
                'flag_code' => 'nl',
                'is_default' => 'No',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
