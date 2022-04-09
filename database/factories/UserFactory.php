<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username'       => $this->faker->name(),
            'first_name'     => $this->faker->name(),
            'last_name'      => $this->faker->name(),
            'email'          => $this->faker->unique()->safeEmail(),
            'password'       => Hash::make('12345678'),
            'role_id'        => '2',
            'remember_token' => Str::random(10),
        ];
    }
}
