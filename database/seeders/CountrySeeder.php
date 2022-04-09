<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            [
                'code' => '1',
                'name' => 'USA'
            ],
            [
                'code' => '2',
                'name' => 'Canada'
            ],
            [
                'name' => 'Ukraine',
                'code' => '3'
            ],
            [
                'name' => 'Turkey',
                'code' => '4'
            ]
        ]);
    }
}
