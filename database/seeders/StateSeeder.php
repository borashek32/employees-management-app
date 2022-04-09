<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            [
                'country_id' => '1',
                'name'       => 'Colorado'
            ],
            [
                'country_id' => '1',
                'name'       => 'Florida'
            ],
            [
                'country_id' => '1',
                'name'       => 'Georgia'
            ],
            [
                'country_id' => '1',
                'name'       => 'Hawaii'
            ],
            [
                'country_id' => '1',
                'name'       => 'Louisiana'
            ],
            [
                'country_id' => '5',
                'name'       => 'Baja California'
            ],
            [
                'country_id' => '5',
                'name'       => 'Durango'
            ],
            [
                'country_id' => '5',
                'name'       => 'Guerrero'
            ],
            [
                'country_id' => '5',
                'name'       => 'México'
            ]
        ]);
    }
}
