<?php

use Illuminate\Database\Seeder;
use App\Currency;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::create(['name' => 'USD', 'conversion' => 1,     'sign' => '$']);
        Currency::create(['name' => 'UAH', 'conversion' => 28.85,  'sign' => '₴']);
    }
}
