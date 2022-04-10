<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('cities')->insert([
      [
        'country_id' => '1',
        'state_id'   => '4',
        'name'       => 'Moscow'
      ],
      [
        'country_id' => '1',
        'state_id'   => '2',
        'name'       => 'New-Yourk'
      ],
      [
        'country_id' => '1',
        'state_id'   => '2',
        'name'       => 'Kiev'
      ]
    ]);
  }
}
