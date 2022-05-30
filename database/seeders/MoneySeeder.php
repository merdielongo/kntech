<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MoneySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::firstOrCreate(['name' => 'Franc congolais', 'symbol' => 'CDF']);
        Currency::firstOrCreate(['name' => 'Dollar americain', 'symbol' => '$']);
    }
}
