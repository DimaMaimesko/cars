<?php

use Illuminate\Database\Seeder;
use App\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create(['name' => 'Киев']);
        City::create(['name' => 'Днепр']);
        City::create(['name' => 'Львов']);
        City::create(['name' => 'Харьков']);
        City::create(['name' => 'Одесса']);
    }
}
