<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'username'        => 'nat',
                'first_name'      => 'Nataly',
                'last_name'       => 'Zueva',
                'email'           => 'borashek@inbox.ru',
                'password'        => Hash::make('11111111'),
            ],
            [
                'username'        => 'vadim',
                'first_name'      => 'Vadim',
                'last_name'       => 'Zuev',
                'email'           => 'borashek88@gmail.com',
                'password'        => Hash::make('22222222'),
            ],
        ]);
    }
}
